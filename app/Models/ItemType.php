<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereName($value)
 * @mixin Eloquent
 */
class ItemType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_types';

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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'is_active'
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
        'is_active' => 'boolean'
    ];
}
