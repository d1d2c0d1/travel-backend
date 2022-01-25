<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemTag
 *
 * @property int $id
 * @property string $title
 * @property int|null $user_id
 * @property \datetime $created_at
 * @property \datetime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemTag whereUserId($value)
 * @mixin \Eloquent
 */
class ItemTag extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_tags';

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
        'title',
        'user_id'
    ];

    /**
     * Validator for insert row by array
     *
     * @param array $arFields
     * @return array
     */
    public function validate(array $arFields): array
    {
        if( empty($arFields) ) {
            return [
                'status' => false,
                'error' => 'All fields is empty or not found'
            ];
        }

        if( !isset($arFields['title']) ) {
            return [
                'status' => false,
                'error' => 'Tag title is empty'
            ];
        }

        return ['status' => true];
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'user_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
}
