<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Category;
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
            'status' => 0
        ];

        if( $request->has('area_id') ) {
            $arFields['area_id'] = (int) $request->input('area_id');
        }

        // Set status for user role or permission denied
        if( MainHelper::isAdminOrModer() ) {
            $arFields['status'] = 2;
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

        if( is_array($properties) ) {
            foreach ($properties as $property) {
                if (!isset($property['property_id']) || !isset($property['value'])) {
                    continue;
                }

                if (empty($property['property_id']) || $property['property_id'] <= 0) {
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
        }

        // Create tags
        $tags = (array) $request->input('tags');

        if( is_array($tags) ) {
            foreach ($tags as $tagId) {
                $item->tags()->attach((int)$tagId, [
                    'user_id' => MainHelper::getUserId()
                ]);
            }
        }

        // Create categories
        $categories = (array) $request->input('categories');

        if( is_array($categories) ) {
            foreach ($categories as $categoryId) {
                $item->categories()->attach((int)$categoryId, [
                    'user_id' => MainHelper::getUserId()
                ]);
            }
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

        // TODO: Need to be refactoring to array
        // Getting data for filter
        $typeId = (int) $request->input('type_id');
        $status = (int) $request->input('status');
        $id = (int) $request->input('id');
        $cityId = (int) $request->input('city_id');
        $cityCode = (string) $request->input('city_code');
        $typeCode = (string) $request->input('type_code');
        $itemCode = (string) $request->input('code');
        $name = (string) $request->input('name');
        $authorID = (int) $request->input('author_id');

        // Search by ID
        if( $id >= 1 ) {
            $itemsDB->where('id', '=', $id);
        }

        // Search by card type
        if( $typeId >= 1 ) {
            $itemsDB->where('type_id', '=', $typeId);
        }

        // Search by card status (1 of 3)
        if( $status >= 1 ) {
            $itemsDB->where('status', '=', $status);
        }

        // Search by item title
        if( mb_strlen($name) >= 3 ) {
            $itemsDB->where('name', 'like', "%{$name}%");
        }

        // Search by author
        if( $authorID >= 1 ) {
            $itemsDB->where('created_user_id', '=', $authorID);
        }

        // Find by City Code
        if( mb_strlen($cityCode) >= 1 ) {
            $city = City::select('id')->where('code', '=', $cityCode)->first();

            if( $city?->id >= 1 ) {
                $itemsDB->where('city_id', '=', $city->id);
            } else {
                $itemsDB->where('city_id', '=', 0); // For getting all cards
            }
        }

        // Search by code
        if( mb_strlen($itemCode) >= 1 ) {
            $itemsDB->where('code', '=', $itemCode);
        }

        // Find by Type Code
        if( mb_strlen($typeCode) >= 1 ) {
            $type = ItemType::select('id')->where('code', '=', $typeCode)->first();

            if( $type?->id >= 1 ) {
                $itemsDB->where('type_id', '=', $type->id);
            }
        }

        // Search by city identify
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

        // Getting IDS for filters
        $itemsDBClone = $itemsDB->clone();

        // Requesting data by relationships
        if( $request->input('short') !== true ) {
            $itemsDB
                ->with('categories')
                ->with('tags')
                ->with('properties')
                ->with('promotions')
                ->with('city')
                ->with('type');
        }

        // Getting filter data
        $itemsID = $itemsDBClone->select(['id', 'city_id', 'type_id'])->get();

        // Getting data with paginate object
        $items = $itemsDB->paginate();

        return response([
            'status' => true,
            'items' => $items,
            'filter' => $this->prepareFilter($itemsID)
        ]);
    }

    /**
     * Prepare IDs Array
     *
     * @param $items
     * @return array
     */
    public function prepareFilter($items): array
    {
        $ids = [];
        $cityIds = [];
        $types = ItemType::all();

        foreach ($items as $item) {
            $ids[] = $item->id;
            $cityIds[] = $item->city_id;
        }

        // Clear arrays from repeat and not normal indexes
        $cityIds = array_values(array_unique($cityIds));
        $cities = City::select(['id', 'name', 'code'])->whereIn('id', $cityIds)->get();

        // TODO: Properties

        $filter = [
            'fields' => [
                'title' => [
                    'type' => 'input',
                    'valueType' => 'string',
                    'min' => 2,
                    'max' => 255
                ],
                'description' => [
                    'type' => 'textarea',
                    'valueType' => 'string',
                    'min' => 3,
                    'max' => 255
                ],
                'cities' => [
                    'type' => 'searchSelect',
                    'valueType' => 'integer',
                    'items' => $cities
                ],
                'types' => [
                    'type' => 'searchSelect',
                    'valueType' => 'integer',
                    'items' => $types
                ],
                'properties' => [
                    'type' => 'checkbox',
                    'valueType' => 'any',
                    'items' => []
                ]
            ]
        ];

//        $categories = Category::where([])

        return $filter;
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
        return $this->setStatus($id, 3);
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
