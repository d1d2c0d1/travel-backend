<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class AdvertType
 *
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdvertType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advert_types';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
     *
     * Date format im model
     *
     **/
    protected $dateFormat = "Y-m-d H:i:s";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
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
        'name' => 'string',
        'code' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
