<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\GuideOrder;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuideController extends Controller
{

    /**
     * Created order for stay guide
     *
     * @param Request $request
     * @return Response
     */
    public function order(Request $request): Response
    {

        if (MainHelper::isGuide()) {
            return response([
                'status' => false,
                'error' => 'You are has guide role on project'
            ], 403);
        }

        $orderData = [
            'created_user_id' => MainHelper::getUserId(),
            'city_id' => (int)$request->input('city_id'),
            'work_experience' => (int)$request->input('work_experience'),
            'excursions' => (string)$request->input('excursions'),
            'about' => (string)$request->input('about')
        ];

        $orders = GuideOrder::where('created_user_id', MainHelper::getUserId())->get();

        if( !$orders->isEmpty() ) {
            return response([
                'status' => false,
                'error' => 'Duplicate order'
            ], 403);
        }

        $order = new GuideOrder($orderData);

        try {
            $order->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with Database',
                'dbError' => MainHelper::isAdminOrModer() ? $e->getMessage() : 'You are not admin for view detailed info!'
            ]);
        }

        return response([
            'status' => true,
            'order' => $order
        ]);
    }

    /**
     * Getting orders
     *
     * @param Request $request
     * @return Response
     */
    public function orders(Request $request): Response
    {

        $ordersDB = GuideOrder::orderByDesc('created_at');

        // Filtering by status
        $status = (string) $request->input('status');
        if( !empty($status) ) {
            $ordersDB->where('status', (int) $status);
        }

        // Filtering by city_id
        $cityId = (int) $request->input('city_id');
        if( $cityId >= 1 ) {
            $ordersDB->where('city_id', $cityId);
        }

        // Filtering by excursions text
        $excursions = (string) $request->input('excursions');
        if( !empty($excursions) ) {
            $ordersDB->where('excursions', 'like', '%' . $excursions . '%');
        }

        // Filtering by about text
        $about = (string) $request->input('about');
        if( !empty($excursions) ) {
            $ordersDB->where('about', 'like', '%' . $about . '%');
        }

        // Filtering by work_experience
        $workExpirience = (string) $request->input('work_experience');
        if( !empty($workExpirience) ) {
            $ordersDB->where('work_experience', (int) $workExpirience);
        }

        if (!MainHelper::isAdminOrModer()) {
            $ordersDB->where('created_user_id', MainHelper::getUserId());
        } else {

            $createdUserId = (int)$request->input('created_user_id');
            $acceptedUserId = (int)$request->input('accepted_user_id');

            if ($createdUserId >= 1) {
                $ordersDB->where('created_user_id', $createdUserId);
            }
            if ($acceptedUserId >= 1) {
                $ordersDB->where('accepted_user_id', $acceptedUserId);
            }

        }

        $ordersDB->with('createdUser')->with('acceptedUser')->with('editUser')->with('city');
        $orders = $ordersDB->paginate();

        if( $orders->isEmpty() ) {
            return response([
                'status' => false,
                'error' => 'Orders not found by filtering params',
                'data' => $orders
            ], 404);
        }

        return response([
            'status' => true,
            'data' => $orders
        ]);
    }

    /**
     * Set status for order
     *
     * Status list:
     * 0 - wait moderation
     * 1 - canceled
     * 2 - accepted
     *
     * @param int $id
     * @param int $status
     * @return Response
     */
    public function setStatus(int $id, int $status = 0): Response
    {
        if( $status <= -1 || $status >= 3 ) {
            return response([
                'status' => false,
                'error' => 'Will passed is invalid status '
            ], 403);
        }

        if( $status == 0 || $status == 2 ) {
            if( !MainHelper::isAdminOrModer() ) {
                return response([
                    'status' => false,
                    'error' => 'You have\'nt rules for use this status'
                ], 403);
            }
        }

        // Finding order in database
        $order = GuideOrder::find($id);

        if( !$order || !$order?->id ) {
            return response([
                'status' => false,
                'error' => 'Guide order is not found'
            ], 404);
        }

        // Check permissions
        if( !MainHelper::isAdminOrModer() ) {
            if( $order->created_user_id !== MainHelper::getUserId() ) {
                return response([
                    'status' => false,
                    'error' => 'You can change status for self orders'
                ], 403);
            }

            if( $order->status == 2 ) {
                return response([
                    'status' => false,
                    'error' => 'Order has accepted status! That can\'t be canceled'
                ], 403);
            }
        }

        // Set status to order
        $order->status = $status;

        /** @var User $user */
        $user = $order->createdUser;

        if( !$user || !$user?->id ) {
            return response([
                'status' => false,
                'error' => 'Created user not found'
            ], 403);
        }

        // If user stay on guide role
        if( $status === 2 ) {
            $user->role_id = 50; // Guide role - 50
            $order->accepted_user_id = MainHelper::getUserId();
        }

        if( $status === 1 ) {
            $user->role_id = 20; // User role - 20
        }

        try {
            $order->save();
            $user->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with Database',
                'dbError' => MainHelper::isAdminOrModer() ? $e->getMessage() : 'You are not admin for view detailed info!'
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $order
        ]);
    }

    /**
     * Change order comment
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function changeComment(int $id, Request $request): Response
    {
        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'You have\'nt permissions'
            ], 403);
        }

        $order = GuideOrder::find($id);

        if( !$order || !$order?->id ) {
            return response([
                'status' => false,
                'error' => 'Guide order not found'
            ], 404);
        }

        $order->comment = (string) $request->input('comment');

        try {
            $order->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with Database',
                'dbError' => MainHelper::isAdminOrModer() ? $e->getMessage() : 'You are not admin for view detailed info!'
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $order
        ]);
    }

    /**
     * Set accepted status for order
     *
     * @param int $id
     * @return Response
     */
    public function accepted(int $id): Response
    {
        return $this->setStatus($id, 2);
    }

    /**
     * Set canceled status for order
     *
     * @param int $id
     * @return Response
     */
    public function canceled(int $id): Response
    {
        return $this->setStatus($id, 1);
    }

    /**
     * Set waiting status for order
     *
     * @param int $id
     * @return Response
     */
    public function waiting(int $id): Response
    {
        return $this->setStatus($id);
    }

}
