<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class Area
 *
 * @package App\Models
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Area extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'areas';

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
        'country_id',
        'region_id',
        'city_id',
        'name',
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
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'name' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [
        'country_id' => ['required', 'numeric'],
        'region_id' => ['required', 'numeric'],
        'city_id' => ['required', 'numeric'],
        'name' => ['required', 'string'],
    ];


    /**
     * Relationship for getting country
     *
     * @return HasOne
     **/
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * Relationship for getting region
     *
     * @return HasOne
     **/
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    /**
     * Relationship for getting city
     *
     * @return HasOne
     **/
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

}
