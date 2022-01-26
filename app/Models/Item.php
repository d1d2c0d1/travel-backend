<?php

namespace App\Models;

use App\Http\Helpers\MainHelper;
use datetime;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $status
 * @property int $created_user_id
 * @property int|null $owner_user_id
 * @property int|null $edit_user_id
 * @property int|null $accepted_user_id
 * @property int|null $company_id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property int|null $area_id
 * @property int|null $type_id
 * @property int|null $phone
 * @property int|null $price
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string|null $image
 * @property int $views
 * @property int $reviews
 * @property int $likes
 * @property int $favorites
 * @property string|null $address
 * @property datetime $created_at
 * @property datetime $updated_at
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item query()
 * @method static Builder|Item whereAcceptedUserId($value)
 * @method static Builder|Item whereAddress($value)
 * @method static Builder|Item whereAreaId($value)
 * @method static Builder|Item whereCityId($value)
 * @method static Builder|Item whereCode($value)
 * @method static Builder|Item whereCompanyId($value)
 * @method static Builder|Item whereCountryId($value)
 * @method static Builder|Item whereCreatedAt($value)
 * @method static Builder|Item whereCreatedUserId($value)
 * @method static Builder|Item whereDescription($value)
 * @method static Builder|Item whereEditUserId($value)
 * @method static Builder|Item whereFavorites($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item whereImage($value)
 * @method static Builder|Item whereLikes($value)
 * @method static Builder|Item whereName($value)
 * @method static Builder|Item whereOwnerUserId($value)
 * @method static Builder|Item wherePhone($value)
 * @method static Builder|Item wherePrice($value)
 * @method static Builder|Item whereRegionId($value)
 * @method static Builder|Item whereReviews($value)
 * @method static Builder|Item whereStatus($value)
 * @method static Builder|Item whereTypeId($value)
 * @method static Builder|Item whereUpdatedAt($value)
 * @method static Builder|Item whereViews($value)
 * @mixin Eloquent
 */
class Item extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *
     * Date format im model
     *
     **/
    protected $dateFormat = "Y-m-d H:i:s";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'created_user_id',
        'owner_user_id',
        'edit_user_id',
        'accepted_user_id',
        'company_id',
        'country_id',
        'region_id',
        'city_id',
        'area_id',
        'category_id',
        'price_type_id',
        'type_id',
        'price',
        'name',
        'code',
        'description',
        'images',
        'views',
        'reviews',
        'likes',
        'favorites',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'created_user_id' => 'integer',
        'owner_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'accepted_user_id' => 'integer',
        'company_id' => 'integer',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'area_id' => 'integer',
        'category_id' => 'integer',
        'price_type_id' => 'integer',
        'type_id' => 'integer',
        'price' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'description' => 'string',
        'images' => 'string',
        'views' => 'integer',
        'reviews' => 'integer',
        'likes' => 'integer',
        'favorites' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Validator
     *
     * @return array
     */
    public function validate(): array
    {
        $errors = [];

        // COUNTRY ID
        if( $this->country_id <= 0 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field country_id is empty');
        }

        // REGION ID
        if( $this->region_id <= 0 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field region_id is empty');
        }

        // CITY ID
        if( $this->city_id <= 0 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field city_id is empty');
        }

        // TYPE ID
        if( $this->type_id <= 0 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field type_id is empty');
        }

        // NAME
        if( mb_strlen($this->name) <= 8 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field name is empty');
        }

        // DESCRIPTION
        if( mb_strlen($this->description) <= 16 ) {
            $errors[] = MainHelper::getErrorItem(412, 'Field description is empty');
        }

        // Without errors
        if( empty($errors) ) {
            return ['status' => true];
        }

        // With errors
        return [
            'status' => false,
            'errors' => $errors
        ];
    }

    /**
     * Relationship for getting categories
     *
     * @return BelongsToMany
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'item_property', 'item_id', 'property_id')->withTimestamps()->as('properties');
    }

    /**
     * Relationship for getting categories
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CardCategory::class, 'item_category', 'item_id', 'category_id')->as('categories');
    }

    /**
     * Relationship for getting categories
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(CardTag::class, 'item_tag', 'item_id', 'tag_id')->as('tags');
    }
}
