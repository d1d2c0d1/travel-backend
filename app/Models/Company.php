<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Carbon;

/**
 * Class Company
 *
 * @package App\Models
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $create_user_id
 * @property integer $owner_user_id
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $area_id
 * @property integer $language_id
 * @property string $point
 * @property string $code
 * @property string $description
 * @property string $logo
 * @property integer $views
 * @property integer $likes
 * @property integer $reviews
 * @property integer $favorites
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Models\User|null $createdUser
 * @property-read \App\Models\User|null $ownerUser
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreateUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFavorites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereReviews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereViews($value)
 * @mixin \Eloquent
 */
class Company extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

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
        'name',
        'create_user_id',
        'owner_user_id',
        'country_id',
        'region_id',
        'city_id',
        'area_id',
        'language_id',
        'point',
        'code',
        'description',
        'logo',
        'views',
        'likes',
        'reviews',
        'favorites',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'name' => 'string',
        'create_user_id' => 'integer',
        'owner_user_id' => 'integer',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'area_id' => 'integer',
        'language_id' => 'integer',
        'point' => 'string',
        'code' => 'string',
        'description' => 'string',
        'logo' => 'string',
        'views' => 'integer',
        'likes' => 'integer',
        'reviews' => 'integer',
        'favorites' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [
        'status' => [],
        'name' => [],
        'create_user_id' => [],
        'owner_user_id' => [],
        'country_id' => [],
        'region_id' => [],
        'city_id' => [],
        'area_id' => [],
        'language_id' => [],
        'point' => [],
        'code' => [],
        'description' => [],
        'logo' => [],
        'views' => [],
        'likes' => [],
        'reviews' => [],
        'favorites' => [],
    ];


    /**
     * Relationship for getting createdUser
     *
     * @return HasOne
     **/
    public function createdUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'create_user_id');
    }

    /**
     * Relationship for getting ownerUser
     *
     * @return HasOne
     **/
    public function ownerUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_user_id');
    }

}
