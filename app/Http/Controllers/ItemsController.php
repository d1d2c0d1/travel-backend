<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\City;
use App\Models\Item;
use App\Models\ItemType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemsController extends Controller
{

    /**
     * Create item
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {

        $arFields = [
            'created_user_id' => MainHelper::getUserId(),
            'owner_user_id' => MainHelper::getUserId(),
            'name' => (string) $request->input('name'),
            'city_id' => (int) $request->input('city_id'),
            'type_id' => (int) $request->input('type_id'),
            'price' => (int) $request->input('price'),
            'phone' => (string) $request->input('phone'),
            'address' => (string) $request->input('address'),
            'description' => (string) $request->input('description'),
        ];

        if( $request->has('area_id') ) {
            $arFields['area_id'] = (int) $request->input('area_id');
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        // Getting city from database
        $city = City::find($arFields['city_id']);

        if( !$city || !$city?->id ) {
            return response([
                'status' => false,
                'error' => 'Field city_id is incorrect and not found in database'
            ], 449);
        }

        $arFields['country_id'] = $city->country_id;
        $arFields['region_id'] = $city->region_id;
        $arFields['code'] = MainHelper::cyr2lat($city->name . '-' . $arFields['name']);

        // Getting images
        $images = (array) $request->input('images');

        if( empty($images) ) {
            return response([
                'status' => false,
                'error' => 'Feild images is empty'
            ], 449);
        }

        $arFields['images'] = $images;

        // Formatting phone and convert to integer
        $arFields['phone'] = (int) preg_replace('/[^0-9]/', '', $arFields['phone']);

        // Create Item
        $item = new Item($arFields);
        $validator = $item->validate();

        if( $validator['status'] === false ) {
            return response([
                'status' => false,
                'error' => 'Bad credentials',
                'validator' => $validator
            ], 449);
        }

        try {
            $item->save();
        } catch (Exception $e) {
            if( (int) $e->getCode() === 23000 ) {

                return response([
                    'status' => false,
                    'error' => 'Find repeat item'
                ], 410);

            } else {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'dbError' => $e->getMessage(),
                    'dbErrorCode' => (int) $e->getCode()
                ], 500);
            }
        }

        // Save properties
        $properties = $request->input('properties');

        foreach ($properties as $property) {
            if( !isset($property['property_id']) || !isset($property['value']) ) {
                continue;
            }

            if( empty($property['property_id']) || $property['property_id'] <= 0 ) {
                continue;
            }

            try {
                $item->properties()->attach($property['property_id'], [
                    'created_user_id' => MainHelper::getUserId(),
                    'value' => $property['value']
                ]);
            } catch (Exception $e) {
                $itemProperties[$property['property_id'] . '_error'] = $e->getMessage();
            }

        }

        // Create tags
        $tags = (array) $request->input('tags');
        foreach ($tags as $tagId) {
            $item->tags()->attach((int) $tagId, [
                'user_id' => MainHelper::getUserId()
            ]);
        }

        // Create categories
        $categories = (array) $request->input('categories');
        foreach ($categories as $categoryId) {
            $item->categories()->attach((int) $categoryId, [
                'user_id' => MainHelper::getUserId()
            ]);
        }

        return response([
            'status' => true,
            'data' => [
                'item' => $item,
                'properties' => $item->properties,
                'tags' => $item->tags,
                'categories' => $item->categories
            ]
        ]);
    }

    /**
     * Remove item
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function delete(int $id, Request $request): Response
    {
        if( !$id || $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty!'
            ]);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::find($id);

        if( !$item || !$item?->id || $item?->id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Row with id:' . $id . ' not found!'
            ]);
        }

        try {
            $item->delete();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }

        return response([
            'status' => true,
            'data' => $item
        ]);
    }

    /**
     * Getting list items
     *
     * @param Request $request
     * @return Response
     */
    public function filter(Request $request): Response
    {

        $itemsDB = Item::orderByDesc('created_at');

        $typeId = (int) $request->input('type_id');
        $status = (int) $request->input('status');
        $id = (int) $request->input('id');
        $cityId = (int) $request->input('city_id');
        $cityCode = (string) $request->input('city_code');
        $typeCode = (string) $request->input('type_code');

        if( $request->input('short') !== true ) {
            $itemsDB->with('categories')->with('tags')->with('properties')->with('promotions');
        }

        if( $id >= 1 ) {
            $itemsDB->where('id', '=', $id);
        }

        if( $typeId >= 1 ) {
            $itemsDB->where('type_id', '=', $typeId);
        }

        if( $status >= 1 ) {
            $itemsDB->where('status', '=', $status);
        }

        // Find by City Code
        if( mb_strlen($cityCode) >= 1 ) {
            $city = City::select('id')->where('code', '=', $cityCode)->first();

            if( $city?->id >= 1 ) {
                $itemsDB->where('city_id', '=', $city->id);
            }
        }

        // Find by Type Code
        if( mb_strlen($typeCode) >= 1 ) {
            $type = ItemType::select('id')->where('code', '=', $typeCode)->first();

            if( $type?->id >= 1 ) {
                $itemsDB->where('type_id', '=', $type->id);
            }
        }

        if( $cityId >= 1 ) {
            $itemsDB->where('city_id', '=', $cityId);
        }

        // Filter by created_at
        if( $request->has('created_at') ) {
            $createdAts = (array) $request->input('created_at');

            if( !empty($createdAts) ) {
                $startPeriod = (int) strtotime($createdAts[0]);
                $endPeriod = (int) strtotime($createdAts[1] ?? null);

                if( $startPeriod >= 15000 ) {
                    $itemsDB->where('created_at', '>=', date('Y-m-d H:i:s', $startPeriod));

                    if($endPeriod >= 15000) {
                        $itemsDB->where('created_at', '<=', date('Y-m-d H:i:s', $endPeriod));
                    }
                }
            }
        }

        $items = $itemsDB->paginate();

        return response([
            'status' => true,
            'items' => $items
        ]);
    }

    /**
     * Set status to Item
     *
     * @param int $id
     * @param int $status
     * @return Response
     */
    public function setStatus(int $id, int $status = 0): Response
    {
        $item = Item::select(['id', 'status'])->find($id);

        if( $item?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Item with ID: {$id} not found"
            ], 404);
        }

        if( $item->status !== $status ) {
            $item->status = $status;

            try {
                $item->save();
            } catch (Exception $e) {
                return MainHelper::getDBError($e);
            }
        }

        return response([
            'status' => true,
            'item' => $item
        ]);
    }

    /**
     * Accepted Item by moderator or administrator
     *
     * @param int $id
     * @return Response
     */
    public function accepted(int $id): Response
    {
        return $this->setStatus($id, 2);
    }

    /**
     * Accepted Item by moderator or administrator
     *
     * @param int $id
     * @return Response
     */
    public function canceled(int $id): Response
    {
        return $this->setStatus($id, 1);
    }

    /**
     * Item update
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function update(int $id, Request $request): Response
    {

        if( $id <= 0 ) {
            return response([
               'status' => false,
               'error' => 'ID cant be empty!'
            ], 405);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::find($id);

        if( !$item || !$item?->id ) {
            return response([
                'status' => false,
                'error' => 'Item with id:' . $id . ' not found'
            ], 404);
        }

        // Set name
        if( $request->has('name') ) {
            $item->name = $request->input('name');
        }

        // Set status
        if( $request->has('status') ) {
            $item->status = (int) $request->input('status');
        }

        // Set phone
        if( $request->has('phone') ) {
            $item->phone = (int) preg_replace('/[^0-9]/', '', $request->input('phone'));
        }

        // Set address
        if( $request->has('address') ) {
            $item->address = $request->input('address');
        }

        // Set price
        if( $request->has('price') ) {
            $item->price = $request->input('price');
        }

        // Set code
        if( $request->has('code') ) {
            $item->code = $request->input('code');
        }

        // Set description
        if( $request->has('description') ) {
            $item->description = $request->input('description');
        }

        // Set description
        if( $request->has('type_id') && ((int) $request->input('type_id') >= 1) ) {
            $item->type_id = (int) $request->input('type_id');
        }

        // Set images
        if( $request->has('images') ) {
            $item->images = (array) $request->input('images');
        }

        // Save item
        try {
            $item->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $item
        ]);
    }

    /**
     * Edit remarks in Item
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function remarks(int $id, Request $request): Response
    {
        $item = Item::select(['id', 'remarks'])->find($id);

        if( $item?->id !== $id ) {
            return response([
                'status' => false,
                'error' => "Item with ID: {$id} not found"
            ], 404);
        }

        $remarks = (string) $request->input('remarks');

        if( $item->remarks !== $remarks ) {

            $item->remarks = $remarks;
            $item->status = 3; // Set is not moderated status

            try {
                $item->save();
            } catch (Exception $e) {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'database_error' => $e->getMessage()
                ]);
            }
        }

        return response([
            'status' => true,
            'item' => $item
        ]);
    }

    /**
     * Detaching or attaching tag from item
     *
     * @param string $type
     * @param string $action
     * @param int $itemId
     * @param int $attachId
     * @param string $value
     * @return Response
     */
    public function connector(string $type, string $action, int $itemId, int $attachId, string $value = ''): Response
    {
        if( $itemId <= 0 || $attachId <= 0 ) {
            return response([
                'status' => false,
                'error' => 'Empty required fields: itemID or attachmentID.'
            ]);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::with('tags')->with('categories')->with('properties')->find($itemId);

        if( !$item || !$item?->id ) {
            return response([
                'status' => false,
                'error' => "Item with id:{$itemId} not found in db"
            ]);
        }

        try {
            if ($type === 'tag') {
                if ($action === 'attach') {
                    $item->tags()->attach($attachId, [
                        'user_id' => MainHelper::getUserId()
                    ]);
                } else {
                    $item->tags()->detach($attachId);
                }
            }

            if ($type === 'category') {
                if ($action === 'attach') {
                    $item->categories()->attach($attachId, [
                        'user_id' => MainHelper::getUserId()
                    ]);
                } else {
                    $item->categories()->detach($attachId);
                }
            }

            if ($type === 'property') {
                if ($action === 'attach') {
                    $item->properties()->attach($attachId, [
                        'created_user_id' => MainHelper::getUserId(),
                        'value' => ''
                    ]);
                } else {
                    $item->properties()->detach($attachId);
                }
            }
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode()
                ]
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $item
        ]);
    }

}
