<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Item;
use App\Models\Order;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class OrderController extends Controller
{

    /**
     * Create row in orders table
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {

        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string|min:13',
            'phone' => 'required|string|min:10|max:32',
            'date_from' => 'required|date',
            'tickets' => 'required|min:1',
            'type_id' => 'required|min:1|exists:App\Models\OrderType,id',
            'item_id' => 'required|exists:App\Models\Item,id'
        ]);

        if( $validator->fails() ) {
            return response([
                'status' => false,
                'error' => 'Validation error',
                'error_messages' => $validator->errors()
            ], 403);
        }

        $data = $validator->getData();

        $item = Item::where('id', '=', (int) $data['item_id'])
            ->with('author')
            ->with('city')
            ->with('type')
            ->first();

        $data['price'] = (int) ($item?->price * $data['tickets']);
        $data['status'] = 0;
        $data['user_id'] = MainHelper::getUserId() <= 0 ? null : MainHelper::getUserId();
        $data['phone'] = (int) preg_replace('/[^0-9]/', '', $data['phone']);
        $data['type_id'] = (int) $request->input('type_id');

        if( $data['type_id'] <= 0 ) {
            $data['type_id'] = 1;
        }

        $order = new Order();
        $order->fill($data);

        try {
            $order->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error in database',
                'database_error' => $e->getMessage()
            ], 500);
        }

        // Send to author notification
        MainHelper::sendAction('alert', $item->author->token, [
            'type' => 'order.create',
            'item' => $item,
            'order' => $order,
            'executor' => MainHelper::getUser()
        ]);

        return response([
            'status' => true,
            'order' => $order
        ]);
    }

    /**
     * Getting orders for user
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        $ordersDB = Order::where([
            ['user_id', '=', MainHelper::getUserId()]
        ])->with('item')->with('user');

        /**
         * Create model by request
         */

        // Ordering response
        if( $request->has('sortField') && $request->has('sortType') ) {
            $sortField = (string) $request->input('sort');
            $sortType = (string) $request->input('sortType');

            if( mb_strtolower($sortType) === 'desc' ) {
                $ordersDB->orderByDesc($sortField);
            }
        } else {
            $ordersDB->orderByDesc('id');
        }

        // Filtering by status
        if( $request->has('status') ) {
            $status = (int) $request->input('status');

            if( $status >= 0 && $status <= 3 ) {
                $ordersDB->where('status', '=', $status);
            }
        }

        // Filtering by is_payment
        if( $request->has('is_payment') ) {
            if( (int) $request->input('is_payment') >= 1 ) {
                $ordersDB->where('is_payment', 1);
            } else {
                $ordersDB->where('is_payment', 0);
            }
        }

        // Getting data from db and paginate that
        $orders = $ordersDB->paginate();

        return response([
            'status' => true,
            'orders' => $orders
        ]);
    }

    /**
     * Getting orders by guide ID
     *
     * @param int $id
     * @return Response
     */
    public function guides(int $id): Response
    {

        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Empty user_id field'
            ]);
        }

        if( !MainHelper::isAdminOrModer() && $id !== MainHelper::getUserId() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied! Only self ID can be explored!'
            ]);
        }

        $items = Item::where('created_user_id', $id)->get();
        $itemsIds = [];

        foreach ($items as $item) {
            $itemsIds[] = $item->id;
        }

        $orders = Order::whereIn('item_id', $itemsIds)->orderByDesc('id')->with('item')->with('user')->get();

        return response([
           'status' => true,
           'orders' => $orders
        ]);
    }

    /**
     * Set status to order
     *
     * @param int $id
     * @param int $status
     * @return Response
     */
    public function setStatus(int $id, int $status = 0, string $comment = null): Response
    {
        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Order ID can\'t be zero!'
            ], 419);
        }

        // Find order in database
        $order = Order::with('item')->with('item')->with('user')->find($id);

        if( $order?->id !== $id ) {
            return response([
                'status' => false,
                'error' => 'Order with ID: ' . $id . ' not found!'
            ], 404);
        }

        if( MainHelper::getUserId() != $order->user_id && MainHelper::isGuide() && !MainHelper::isAdminOrModer() ) {
            if ($order->item->created_user_id !== MainHelper::getUserId()) {
                return response([
                    'status' => false,
                    'error' => 'Only item owner can change order status'
                ], 403);
            }
        } else {
            if( !MainHelper::isAdminOrModer() ) {
                if( $order->user_id !== MainHelper::getUserId() ) {
                    return response([
                        'status' => false,
                        'error' => 'Only creator can canceled self order!'
                    ], 403);
                }
            }
        }

        $order->status = $status;

        try {
            $order->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with database',
                'database_error' => $e->getMessage()
            ]);
        }

        // Send action to user (accepted)
        if( $order->status === 2 ) {
            MainHelper::sendAction('alert', $order->user->token, [
                'type' => 'order.accept',
                'order' => $order,
                'executor' => MainHelper::getUser()
            ]);
        }

        // Send action to user (canceled)
        if( $order->status === 1 ) {
            MainHelper::sendAction('alert', $order->user->token, [
                'type' => 'order.cancel',
                'order' => $order,
                'executor' => MainHelper::getUser()
            ]);
        }

        return response([
            'status' => true,
            'order' => $order
        ]);
    }

    /**
     * Accepted order by gid
     *
     * @param int $id
     * @return Response
     */
    public function accepted(int $id): Response
    {
        return $this->setStatus($id, 2);
    }

    /**
     * Canceled order by gid
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function canceled(int $id, Request $request): Response
    {
        $comment = null;

        if( $request->has('comment') ) {
            $comment = (string) $request->input('comment');
        }

        return $this->setStatus($id, 1, $comment);
    }

}
