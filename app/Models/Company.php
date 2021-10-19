<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Carbon;

/**
 * Class Company
 * @package App\Models
 *
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
