<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardCategory;
use App\Models\CardTag;
use App\Models\City;
use App\Models\Item;
use App\Models\ItemProperty;
use App\Models\ItemType;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

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
        $validate = MainHelper::validate($request, Item::CREATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }
        $arFields = [
            'created_user_id' => MainHelper::getUserId(),
            'owner_user_id' => MainHelper::getUserId(),
            'name' => (string)$request->input('name'),
            'city_id' => (int)$request->input('city_id'),
            'type_id' => (int)$request->input('type_id'),
            'price' => (int)$request->input('price'),
            'phone' => (string)$request->input('phone'),
            'address' => (string)$request->input('address'),
            'description' => (string)$request->input('description'),
            'seo_title' => (string)$request->input('seo_title'),
            'seo_description' => (string)$request->input('seo_description'),
            'status' => 0
        ];

        if ($request->has('area_id')) {
            $arFields['area_id'] = (int)$request->input('area_id');
        }

        // Set status accepted
        if (MainHelper::isAdminOrModer()) {
            $arFields['status'] = 2;
        }

        // Getting city from database
        $city = City::find($arFields['city_id']);

        if (!$city || !$city?->id) {
            return response([
                'status' => false,
                'error' => 'Field city_id is incorrect and not found in database'
            ], 449);
        }

        $arFields['country_id'] = $city->country_id;
        $arFields['region_id'] = $city->region_id;
        $arFields['code'] = MainHelper::cyr2lat($city->name . '-' . $arFields['name']);

        // Getting images

        $arFields['images'] = (array) $request->input('images');
        $images = (array)$request->input('images');

        if (empty($images)) {
            return response([
                'status' => false,
                'error' => 'Feild images is empty'
            ], 449);
        }

        $arFields['images'] = $images;

        // Formatting phone and convert to integer
        $arFields['phone'] = (int)preg_replace('/[^0-9]/', '', $arFields['phone']);

        // Create Item
        $item = new Item($arFields);
        $validator = $item->validate();

        if ($validator['status'] === false) {
            return response([
                'status' => false,
                'error' => 'Bad credentials',
                'validator' => $validator
            ], 449);
        }

        try {
            $item->save();
        } catch (Exception $e) {
            if ((int)$e->getCode() === 23000) {

                return response([
                    'status' => false,
                    'error' => 'Find repeat item'
                ], 410);

            } else {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'dbError' => $e->getMessage(),
                    'dbErrorCode' => (int)$e->getCode()
                ], 500);
            }
        }

        // Save properties
        $properties = $request->input('properties');
        $itemProperties = [];

        if (is_array($properties)) {
            $itemProperties = $item->attachProperties($properties);
        }

        // Create tags
        $tags = (array)$request->input('tags');

        if (is_array($tags)) {
            foreach ($tags as $tagId) {
                $item->tags()->attach((int)$tagId, [
                    'user_id' => MainHelper::getUserId()
                ]);
            }
        }

        // Create categories
        $categories = (array)$request->input('categories');

        if (is_array($categories)) {
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
                'categories' => $item->categories,
                'itemProperties' => $itemProperties
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
        if (!$id || $id <= 0) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty!'
            ]);
        }

        if (!MainHelper::isGuide()) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::find($id);

        if (!$item || !$item?->id || $item?->id <= 0) {
            return response([
                'status' => false,
                'error' => 'Row with id:' . $id . ' not found!'
            ]);
        }

        if (MainHelper::getUserRole()?->is_guide && !MainHelper::isAdminOrModer()) {
            if ($item->created_user_id !== MainHelper::getUserId()) {
                return response([
                    'status' => false,
                    'error' => 'Only self items can be deleted!'
                ], 401);
            }
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
        $typeId = (int)$request->input('type_id');
        $status = (int)$request->input('status');
        $id = (int)$request->input('id');
        $cityId = (int)$request->input('city_id');
        $cityCode = (string)$request->input('city_code');
        $typeCode = (string)$request->input('type_code');
        $itemCode = (string)$request->input('code');
        $name = (string)$request->input('name');
        $authorID = (int)$request->input('author_id');
        $acceptedID = (int)$request->input('accepted_user_id');
        $editedID = (int)$request->input('edit_user_id');

        // Search by ID
        if ($id >= 1) {
            $itemsDB->where('id', '=', $id);
        }

        // Search by card type
        if ($typeId >= 1) {
            $itemsDB->where('type_id', '=', $typeId);
        }

        // Search by card status (1 of 3)
        if (MainHelper::isGuide()) {
            if ($status >= 1) {
                $itemsDB->where('status', '=', $status);
            }
        } else {
            $itemsDB->where('status', '=', 2);
        }

        // Search by item title
        if (mb_strlen($name) >= 2) {
            $itemsDB->where('name', 'like', "%{$name}%");
        }

        // Search by author
        if ($authorID >= 1) {
            $itemsDB->where('created_user_id', '=', $authorID);
        }

        // Search by accepted user
        if ($acceptedID >= 1) {
            $itemsDB->where('accepted_user_id', '=', $acceptedID);
        }

        // Search by edited user
        if ($editedID >= 1) {
            $itemsDB->where('edit_user_id', '=', $editedID);
        }

        // Find by City Code
        if (mb_strlen($cityCode) >= 1) {
            $city = City::select('id')->where('code', '=', $cityCode)->first();

            if ($city?->id >= 1) {
                $itemsDB->where('city_id', '=', $city->id);
            } else {
                $itemsDB->where('city_id', '=', 0); // For getting all cards
            }
        }

        // Search by code
        if (mb_strlen($itemCode) >= 1) {
            $itemsDB->where('code', '=', $itemCode);
        }

        // Find by Type Code
        if (mb_strlen($typeCode) >= 1) {
            $type = ItemType::select('id')->where('code', '=', $typeCode)->first();

            if ($type?->id >= 1) {
                $itemsDB->where('type_id', '=', $type->id);
                $typeId = $type->id;
            }
        }

        // Search by city identify
        if ($cityId >= 1) {
            $itemsDB->where('city_id', '=', $cityId);
        }

        // Filter by created_at
        if ($request->has('created_at')) {
            $createdAts = (array)$request->input('created_at');

            if (!empty($createdAts)) {
                $startPeriod = (int)strtotime($createdAts[0]);
                $endPeriod = (int)strtotime($createdAts[1] ?? null);

                if ($startPeriod >= 15000) {
                    $itemsDB->where('created_at', '>=', date('Y-m-d H:i:s', $startPeriod));

                    if ($endPeriod >= 15000) {
                        $itemsDB->where('created_at', '<=', date('Y-m-d H:i:s', $endPeriod));
                    }
                }
            }
        }

        // Filtering by categories
        if ($request->has('categories')) {
            $categories = (array)$request->input('categories');

            if (!empty($categories)) {
                $itemsDB->whereHas('categories', function ($query) use ($categories) {
                    $query->where(function ($query) use ($categories) {
                        foreach ($categories as $categoryId) {
                            $query->orWhere('category_id', $categoryId);
                        }
                    });
                });
            }
        }

        // Filtering by tags
        if ($request->has('tags')) {
            $tags = (array)$request->input('tags');

            if (!empty($tags)) {
                $itemsDB->whereHas('tags', function ($query) use ($tags) {
                    $query->where(function ($query) use ($tags) {
                        foreach ($tags as $tagId) {
                            $query->orWhere('tag_id', $tagId);
                        }
                    });
                });
            }
        }

        // Filtering by price
        if ($request->has('price')) {
            $price = $request->input('price');

            if (isset($price['from']) && isset($price['to'])) {
                $itemsDB->where([
                    ['price', '>=', $price['from']],
                    ['price', '<=', $price['to']]
                ]);
            }

            if ((int)$price >= 10) {
                $itemsDB->where('price', '=', (int)$price);
            }
        }

        // Filter by properties
        if ($request->has('properties')) {
            $properties = (array)$request->input('properties');

            $itemsDB->whereHas('properties', function ($query) use ($properties) {
                $query->where(function ($query) use ($properties) {
                    foreach ($properties as $propertyId => $propertyValue) {
                        $query->orWhere([
                            ['property_id', '=', $propertyId],
                            ['value', '=', $propertyValue]
                        ]);
                    }
                });
            });
        }

        // Getting IDS for filters
        $itemsDBClone = $itemsDB->clone();

        // Requesting data by relationships
        if ($request->input('short') !== true) {
            $itemsDB
                ->with('categories')
                ->with('tags')
                ->with('properties')
                ->with('promotions')
                ->with('city')
                ->with('type')
                ->with('author')
                ->with('accepted');
        }

        // Getting filter data
        $itemsID = $itemsDBClone->select(['id', 'city_id', 'type_id'])->get();

        // Getting data with paginate object
        $items = $itemsDB->paginate();
        return response([
            'status' => true,
            'total' => $items->total(),
            'items' => $items,
            'filter' => $this->prepareFilter($itemsID, $typeId)
        ], 200);
    }

    /**
     * Prepare tags for filter
     *
     * @param $items
     * @param int $typeId
     * @return array
     */
    public function prepareFilterTags($items, int $typeId): Collection
    {
        $ids = [];

        foreach ($items as $item) {
            $ids[] = $item->id;
        }


        $tagsDB = CardTag::orderByDesc('created_at');

        if (!empty($ids)) {
            $tagsDB->whereHas('items', function ($query) use ($ids) {
                return $query->whereIn('items.id', $ids);
            });
        }

        return $tagsDB->get();
    }

    /**
     * Prepare IDs Array
     *
     * @param $items
     * @param int $typeId
     * @return array
     */
    public function prepareFilter($items, int $typeId): array
    {
        $ids = [];
        $cityIds = [];
        $types = ItemType::where('is_active', '=', 1)->get();
        foreach ($items as $item) {
            $ids[] = $item->id;
            $cityIds[] = $item->city_id;
        }
        $minPrice = 0;
        $maxPrice = Item::whereIn('id', $ids)->max('price');

        // Clear arrays from repeat and not normal indexes
        $cities = City::all();

        if ($typeId >= 1) {

            // If selected cards type
            $properties = Property::where('type_id', $typeId)->get();
            $categories = CardCategory::where('type_id', $typeId)->get();

        } else {

            // If not selected type
            $properties = Property::all();
            $categories = CardCategory::all();

        }

        foreach ($properties as $key => $property) {
            $values = [];
            $itemProperties = ItemProperty::select(['property_id', 'value'])->where('property_id', '=', $property->id)->groupBy('property_id', 'value')->get();

            foreach ($itemProperties as $itemProperty) {
                $values[] = $itemProperty->value;
            }

            $property->values = $values;

            $properties[$key] = $property;
        }

        $tags = $this->prepareFilterTags($items, $typeId);
        // из ids мы берем минимальную и максимальную цену и запихиваем ее в price
        return [
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
                'categories' => [
                    'type' => 'checkbox',
                    'valueType' => 'integer',
                    'items' => $categories
                ],
                'tags' => [
                    'type' => 'checkbox',
                    'valueType' => 'integer',
                    'items' => $tags
                ],
                'properties' => [
                    'type' => 'properties',
                    'valueType' => 'any',
                    'items' => $properties
                ],
                'price' => [
                    'type' => 'range',
                    'valueType' => 'integer',
                    'min' => $minPrice,
                    'max' => $maxPrice
                ]
            ]
        ];
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

        if ($item?->id !== $id) {
            return response([
                'status' => false,
                'error' => "Item with ID: {$id} not found"
            ], 404);
        }

        if ($item->status !== $status) {
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
     * Set wait status for items
     *
     * @param int $id
     * @return Response
     */
    public function waited(int $id): Response
    {
        return $this->setStatus($id);
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

        if ($id <= 0) {
            return response([
                'status' => false,
                'error' => 'ID cant be empty!'
            ], 405);
        }

        $item = Item::where('id', '=', $id)->with('properties')->first();
        if (!MainHelper::isGuide()) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::where('id', '=', $id)->with('tags')->with('categories')->with('properties')->first();

        if (!$item || !$item?->id) {
            return response([
                'status' => false,
                'error' => 'Item with id:' . $id . ' not found'
            ], 404);
        }

        // If guide send request
        if (!MainHelper::isAdminOrModer()) {
            if ($item->created_user_id !== MainHelper::getUserId()) {
                return response([
                    'status' => false,
                    'error' => 'Requested user not owner for item'
                ], 401);
            }
        }
        $validate = MainHelper::validate($request, Item::UPDATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }

        foreach ($validate->getData() as $key=>$value) {
               switch ($key) {
                   case 'phone':
                       $item->phone = (int) preg_replace('/[^0-9]/', '', $request->input('phone'));
                    break;
                   case 'type_id':
                    if(((int) $request->input('type_id') >= 1) ) {
                           $item->type_id = (int) $request->input('type_id');
                       }
                    break;
                   case 'city_id':
                       if(((int) $request->input('city_id') >= 1) ) {
                           $item->city_id = (int) $request->input('city_id');
                       }
                       break;
                   default:
                       $item->$key = $value;
                       break;
               }
        }

        // Set name
        if ($request->has('name')) {
            $item->name = $request->input('name');
        }

        // Set status
        if ($request->has('status')) {
            $item->status = (int)$request->input('status');
        }

        // Set phone
        if ($request->has('phone')) {
            $item->phone = (int)preg_replace('/[^0-9]/', '', $request->input('phone'));
        }

        // Set address
        if ($request->has('address')) {
            $item->address = $request->input('address');
        }

        // Set price
        if ($request->has('price')) {
            $item->price = $request->input('price');
        }

        // Set code
        if ($request->has('code')) {
            $item->code = $request->input('code');
        }

        // Set description
        if ($request->has('description')) {
            $item->description = $request->input('description');
        }

        // Set type_id
        if ($request->has('type_id') && ((int)$request->input('type_id') >= 1)) {
            $item->type_id = (int)$request->input('type_id');
        }

        // Set type_id
        if ($request->has('city_id') && ((int)$request->input('city_id') >= 1)) {
            $item->city_id = (int)$request->input('city_id');
        }

        // Set images
        if ($request->has('images')) {
            $item->images = (array)$request->input('images');
        }

        // Set properties
        $properties = $request->input('properties');

        if (is_array($properties)) {
            $item->attachProperties($properties);
        }

        // Set categories
        $categories = $request->input('categories');

        if (is_array($categories)) {
            $item->attachCategories($categories);
        }

        // Set tags
        $tags = $request->input('tags');

        if (is_array($tags)) {
            $item->attachTags($tags);
        }

        if ($request->has('seo_title')) {
            $item->seo_title = (string)$request->input('seo_title');
        }

        if ($request->has('seo_description')) {
            $item->seo_description = (string)$request->input('seo_description');
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

        // Reload data from database
        $item = $item->fresh(['categories', 'tags', 'properties']);

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

        if ($item?->id !== $id) {
            return response([
                'status' => false,
                'error' => "Item with ID: {$id} not found"
            ], 404);
        }

        $remarks = (string)$request->input('remarks');

        if ($item->remarks !== $remarks) {

            $item->remarks = $remarks;
            $item->status = 1; // Set is not moderated status

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
        if ($itemId <= 0 || $attachId <= 0) {
            return response([
                'status' => false,
                'error' => 'Empty required fields: itemID or attachmentID.'
            ]);
        }

        if (!MainHelper::isAdminOrModer()) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $item = Item::with('tags')->with('categories')->with('properties')->find($itemId);

        if (!$item || !$item?->id) {
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
