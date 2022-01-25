<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemProperty
 *
 * @property int $id
 * @property int $created_user_id
 * @property int|null $edit_user_id
 * @property int $item_id
 * @property int $property_id
 * @property string|null $value
 * @property \datetime $created_at
 * @property \datetime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereEditUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemProperty whereValue($value)
 * @mixin \Eloquent
 */
class ItemProperty extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_property';

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
        'created_user_id',
        'edit_user_id',
        'item_id',
        'property_id',
        'value'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'item_id' => 'integer',
        'property_id' => 'integer',
        'value' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
}
