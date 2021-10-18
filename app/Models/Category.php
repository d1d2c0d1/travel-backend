<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Carbon;

/**
 * Class Category
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property integer $created_user_id
 * @property integer $edit_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Category extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
        'name',
        'code',
        'description',
        'created_user_id',
        'edit_user_id',
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
        'description' => 'string',
        'created_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [
        'name' => [],
        'code' => [],
        'description' => [],
        'created_user_id' => [],
        'edit_user_id' => [],
    ];


    /**
     * Relationship for getting createdUser
     *
     * @return HasOne
     **/
    public function createdUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_user_id');
    }

    /**
     * Relationship for getting editUser
     *
     * @return HasOne
     **/
    public function editUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'edit_user_id');
    }

}
