<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Item;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    /**
     * Reviews Filter
     *
     * @param Request $request
     * @return Response
     *
     * @requestField item_id Идентификатор карточки для которой создан отзыв
     * @requestField author_id Идентификатор пользователя который создал отзыв
     */
    public function index(Request $request): Response
    {

        $reviewsDB = Review::orderByDesc('created_at');

        if( $request->has('item_id') ) {
            $itemId = (int) $request->input('item_id');

            if( $itemId >= 1 ) {
                $reviewsDB->where('item_id', $itemId);
            }
        }

        if( $request->has('author_id') ) {
            $authorId = (int) $request->input('author_id');

            if( $authorId >= 1 ) {
                $reviewsDB->where('created_user_id', $authorId);
            }
        }

        $reviews = $reviewsDB->paginate();

        return response([
            'status' => true,
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {

        $arFields = [
            'created_user_id' => MainHelper::getUserId(),
            'accepted_user_id' => null,
            'edit_user_id' => null,
            'status' => 0,
            'item_id' => (int) $request->input('item_id'),
            'rating' => (float) $request->input('rating'),
            'comment' => (string) $request->input('comment'),
            'gallery' => []
        ];

        if( $arFields['item_id'] <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Item ID is empty!',
                'field' => 'item_id'
            ], 449);
        }

        if( $arFields['rating'] <= 0 || $arFields['rating'] > 50 ) {
            return response([
                'status' => false,
                'error' => 'Rating not in range: 0 .. 50!',
                'field' => 'rating'
            ], 449);
        }

        if( mb_strlen($arFields['comment']) <= 4 ) {
            return response([
                'status' => false,
                'error' => 'Comment is too short!',
                'field' => 'comment'
            ], 449);
        }

        if( $request->has('gallery') ) {
            $gallery = $request->input('gallery');

            if( !empty($gallery) ) {
                $arFields['gallery'] = $gallery;
            }
        }

        $item = Item::find($arFields['item_id']);

        if( $item?->id !== $arFields['item_id'] ) {
            return response([
                'status' => false,
                'error' => 'Item with ID: "' . $arFields['item_id'] . '" not found in database!',
                'field' => 'item_id'
            ], 449);
        }

        // Create row
        $review = new Review($arFields);

        try {
            $review->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with database',
                'databaseError' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $review = Review::find($id);

        if( $review?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Review with ID:{$id} not found!"
            ], 449);
        }

        if( $request->has('rating') ) {

            $rating = (int) $request->input('rating');

            if( $rating <= 0 || $rating > 50 ) {
                return response([
                    'status' => false,
                    'error' => 'Rating not in allowed range: 1 .. 50',
                    'field' => 'rating'
                ], 449);
            }

            $review->rating = $rating;
        }

        if( $request->has('gallery') ) {
            $gallery = $request->input('gallery');

            if( !empty($gallery) && $review->gallery !== $gallery ) {
                $review->gallery = $gallery;
            }
        }

        if( $request->has('comment') ) {
            $comment = $request->input('comment');

            if( $review->comment !== $comment ) {
                $review->comment = $comment;
            }
        }

        $review->edit_user_id = MainHelper::getUserId();

        try {
            $review->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with database',
                'databaseError' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'review' => $review
        ]);
    }

    /**
     * Remove Review
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id): Response
    {

        $review = Review::find($id);

        if( $review?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Review with ID: {$id} not found!"
            ], 404);
        }

        try {
            $review->delete();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error in database',
                'databaseError' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $review
        ]);
    }

    /**
     * Set moderated status
     *
     * @param int $id
     * @return Response
     */
    public function setStatus(int $id, int $status = 0): Response
    {
        $review = Review::find($id);

        if( $review?->id !== $id ) {
            return response([
                'status' => true,
                'error' => "Review with ID: {$id} not found!"
            ], 404);
        }

        $review->status = $status;

        if( $status === 2 ) {
            $review->accepted_user_id = MainHelper::getUserId();
        }

        $review->edit_user_id = MainHelper::getUserId();

        try {
            $review->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with database',
                'databaseError' => $e->getMessage()
            ]);
        }

        return response([
            'status' => true,
            'data' => $review
        ]);
    }
}
