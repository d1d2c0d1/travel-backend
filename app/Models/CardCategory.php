<?php

namespace App\Models;

use App\Http\Helpers\MainHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemCategory
 *
 * @property int $id
 * @property int|null $type_id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property \datetime $created_at
 * @property \datetime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CardCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CardCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card_categories';

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
        'type_id',
        'name',
        'code',
        'description'
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
        'type_id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'description' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Validator
     *
     * @param array $arFields
     * @return array
     */
    public function validate(array &$arFields): array {

        if( empty($arFields) ) {
            return [
                'status' => false,
                'error' => 'All fields not found!'
            ];
        }

        $errors = [];

        // TYPE ID
        if( !isset($arFields['type_id']) ) {
            $errors[] = MainHelper::getErrorItem(412, 'type_id not found in field list');
        } else {
            if( $arFields['type_id'] <= 0 ) {
                $errors[] = MainHelper::getErrorItem(412, 'type_id cant be empty or equal zero');
            }
        }

        // NAME
        if( !isset($arFields['name']) ) {
            $errors[] = MainHelper::getErrorItem(412, 'name not found in field list');
        } else {
            if( empty($arFields['name']) ) {
                $errors[] = MainHelper::getErrorItem(412, 'name cant be empty or equal zero');
            }
        }

        if( !isset($arFields['description']) ) {
            $arFields['description'] = '';
        }

        if( !isset($arFields['code']) ) {
            $arFields['code'] = '';
        }

        // Return result
        if( empty($errors) ) {
            return ['status' => true];
        } else {
            return ['status' => false, 'errors' => $errors];
        }
    }

    const RuleList = [];
}
