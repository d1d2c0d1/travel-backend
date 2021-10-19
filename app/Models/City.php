<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class City
 * @package App\Models
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];

    const RuleList = [

        'country_id' => ['required', 'numeric'],
        'region_id' => ['numeric', 'required'],
        'name' => ['min:2', 'required', 'string'],

    ];

    /**
     * Relationship for connection with Country model
     *
     * @return HasOne
     */
    public function country():HasOne
    {
        return $this->hasOne(Country::class, 'id', 'region_id');
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

}
