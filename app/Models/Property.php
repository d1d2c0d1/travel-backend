<?php

namespace App\Models;

use App\Http\Helpers\MainHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int|null $type_id
 * @property string $default
 * @property int $user_id
 * @property \datetime $created_at
 * @property \datetime $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUserId($value)
 * @mixin \Eloquent
 */
class Property extends Model
{

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'properties';

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
        'type_id',
        'default',
        'user_id',
        'values',
        'is_select'
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
        'type_id' => 'integer',
        'default' => 'string',
        'user_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'values' => 'json',
        'is_select' => 'boolean'
    ];

    /**
     * Validator
     *
     * @return array
     */
    public function validate(): array
    {
        $errors = [];

        // NAME
        if( mb_strlen($this->name) <= 4 ) {
            $errors[] = MainHelper::getErrorItem(412, 'name field value is too short');
        }

        // TYPE ID
        if( $this->type_id <= 0 ) {
            $errors[] = MainHelper::getErrorItem(412, 'type_id field empty or equal zero');
        }

        if( !empty($errors) ) {
            return [
                'status' => false,
                'errors' => $errors
            ];
        } else {
            return ['status' => true];
        }
    }
}
