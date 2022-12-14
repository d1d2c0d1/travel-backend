<?php

namespace App\Models;

use App\Observers\CityObserver;
use App\Observers\CommentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class City
 *
 * @package App\Models
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $title
 * @property string $description
 * @property string $album
 * @property string $seo_title
 * @property string $seo_description
 * @property string $image
 * @property string $faq
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereFaq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

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
        'name',
        'seo_title',
        'seo_description',
        'album',

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
        'name' => 'string',
        'code' => 'string',
        'seo_title' => 'string',
        'seo_description' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'album' => 'json'

    ];

    const RuleList = [

        'country_id' => ['required', 'numeric'],
        'region_id' => ['numeric', 'required'],
        'name' => ['min:2', 'required', 'string'],

    ];

    /**
     * Boot config for model
     *
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();
        self::observe(CityObserver::class);
    }

    /**
     * Relationship for connection with Country model
     *
     * @return HasOne
     */
    public function country():HasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * Relationship for connection with Region table
     *
     * @return HasOne
     */
    public function region():HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    /**
     * Relationship for getting areas
     *
     * @return HasMany
     */
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class, 'city_id', 'id');
    }

}
