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
            'item_id' => 'required|exists:App\Models\Item,id'
        ]);

        if( $validator->fails() ) {
            return response([
                'status' => false,
                'error' => 'Validation error',
                'error_messages' => $validator->errors()
            ]);
        }

        $data = $validator->getData();

        $item = Item::find((int) $data['item_id']);

        $data['price'] = (int) ($item?->price * $data['tickets']);
        $data['status'] = 0;
        $data['user_id'] = MainHelper::getUserId() <= 0 ? null : MainHelper::getUserId();
        $data['phone'] = (int) preg_replace('/[^0-9]/', '', $data['phone']);

        $order = new Order();
        $order->fill($data);

        try {
            $order->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error in database',
                'database_error' => $e->getMessage()
            ]);
        }

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

            if( mb_strtolower($sortType) === 'asc' ) {
                $ordersDB->orderByDesc($sortField);
            }
        }

        // Filtering by status
        if( $request->has('status') ) {
            $status = (int) $request->input('status');

            if( $status >= 0 && $status <= 3 ) {
                $ordersDB->where('status', '=', $status);
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
     * Set status to order
     *
     * @param int $id
     * @param int $status
     * @return Response
     */
    public function setStatus(int $id, int $status = 0): Response
    {
        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Order ID can\'t be zero!'
            ], 419);
        }

        // Find order in database
        $order = Order::with('item')->with('user')->find($id);

        if( $order?->id !== $id ) {
            return response([
                'status' => false,
                'error' => 'Order with ID: ' . $id . ' not found!'
            ], 404);
        }

        if( MainHelper::isGuide() && !MainHelper::isAdminOrModer() ) {
            if ($order->item->created_user_id !== MainHelper::getUserId()) {
                return response([
                    'status' => false,
                    'error' => 'Only item owner can change order status'
                ], 403);
            }
        }

        if( !MainHelper::isAdminOrModer() ) {
            if( $order->user_id !== MainHelper::getUserId() ) {
                return response([
                    'status' => false,
                    'error' => 'Only creator can canceled self order!'
                ], 403);
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
     * Accepted order by gid
     *
     * @param int $id
     * @return Response
     */
    public function canceled(int $id): Response
    {
        return $this->setStatus($id, 1);
    }

}
