<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Favorite;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavoritesController extends Controller
{

    /**
     * Toggle favorite to item
     *
     * @param int $itemId
     * @return Response
     */
    public function toggle(int $id): Response
    {

        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Item with 0 ID not found'
            ], 404);
        }

        $item = Item::find($id);

        if( $item?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Item with ID:{$id} not found"
            ], 404);
        }

        // Getting favorites for user to item
        $favorite = Favorite::where([
            ['item_id', '=', $id],
            ['user_id', '=', MainHelper::getUserId()]
        ])->first();

        $isFavorite = true;

        if( $favorite?->id ) {
            try {
                $favorite->delete();
            } catch (Exception $e) {
                return response([
                    'status' => false,
                    'error' => 'Error with database',
                    'database_error' => $e->getMessage()
                ], 500);
            } finally {
                $item->favorites -= 1;
            }

            $isFavorite = false;

        } else {

            $favorite = new Favorite([
                'item_id' => $id,
                'user_id' => MainHelper::getUserId()
            ]);

            try {
                $favorite->save();
            } catch (Exception $e) {
                return response([
                    'status' => false,
                    'error' => 'Error with database',
                    'database_error' => $e->getMessage()
                ], 500);
            } finally {
                $item->favorites += 1;
            }

        }

        try {
            $item->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Can\'t save count favorites for Item',
                'database_error' => $e->getMessage()
            ]);
        }

        return response([
            'status' => true,
            'isFavorite' => $isFavorite
        ]);
    }

}
