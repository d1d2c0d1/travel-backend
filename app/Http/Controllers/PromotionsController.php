<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Item;
use App\Models\Promotion;
use App\Models\PromotionPosition;
use App\Models\PromotionSubPosition;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;


class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function filter(Request $request): Response
    {
        $promotions = [];

        return response([
           'status' => true,
           'data' => $promotions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {

        $validator = Validator::make($request->all(), [
            'item_id' => 'required|min:1|exists:App\Models\Item,id',
            'owner_id' => 'required|min:1|exists:App\Models\User,id',
            'position' => 'required|integer|min:1|max:1000|',
            'subposition' => 'required|integer|min:1|max:1000|',
            'page' => 'required|integer|min:1|max:100|',
        ]);

        if( $validator->fails() ) {
            return response([
                'status' => false,
                'error' => 'Is not valid fields',
                'error_messages' => $validator->messages()
            ], 449);
        }

        // Getting data from request
        $data = $validator->getData();
        $data['status'] = 1;
        $data['is_payment'] = 0;

        // Getting item
        $price = Item::select('price')->find($data['item_id'])?->price;

        // Counting percent for payment
        $promotionPrice = $price * 15 / 100;
        $data['price'] = (int) $promotionPrice;
        $data['expiration_date'] = date('Y-m-d H:i:s', strtotime('+30 days'));

        $promotion = new Promotion();
        $promotion->fill($data);

        try {
            $promotion->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error in database',
                'database_error' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $promotion
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function single(int $id): Response
    {
        $promotion = Promotion::where('id', $id)->with('item')->with('owner');

        if( !MainHelper::isAdminOrModer() ) {
            $promotion->where('owner_id', MainHelper::getUserId());
        }

        $promotion = $promotion->first();

        if( $promotion?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Promotion with ID:{$id} not found!"
            ], 404);
        }

        return response([
            'status' => true,
            'data' => $promotion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function edit(int $id, Request $request)
    {

        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'ID not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'position' => 'required|integer|min:1|max:1000|',
            'subposition' => 'required|integer|min:1|max:1000|',
            'page' => 'required|integer|min:1|max:100|'
        ]);

        if( $validator->fails() ) {
            return response([
                'status' => false,
                'error' => 'Is not valid fields',
                'error_messages' => $validator->messages()
            ], 449);
        }

        return response([
            'status' => true,
            'data' => []
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        return response([
            'status' => true,
            'data' => []
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        return response([
            'status' => true,
            'data' => []
        ]);
    }

    /**
     * Getting positions
     *
     * @param Request $request
     * @return Response
     */
    public function positions(Request $request): Response
    {
        return response([
            'status' => true,
            'data' => PromotionPosition::all()
        ]);
    }

    /**
     * Getting subpositions
     *
     * @param Request $request
     * @return Response
     */
    public function subPositions(Request $request): Response
    {
        $positionId = (int) $request->input('position_id');
        $subPositions = PromotionSubPosition::where('position_id', '=', $positionId)->get();

        return response([
            'status' => true,
            'data' => $subPositions
        ]);
    }
}
