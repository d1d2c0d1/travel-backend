<?php

namespace App\Models;

use App\Http\Helpers\MainHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'user_id'
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
        'updated_at' => 'datetime:Y-m-d H:i:s'
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
