<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class Permission
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $admin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Permission extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
        'admin',

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
        'admin' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];

    const RuleList = [

        'name' => ['required', 'min:3', 'string'],
        'code' => ['min:3', 'required', 'string', 'regex:/^[A-Za-z0-9_]+$/'],
        'admin' => ['numeric', 'min:0'],

    ];

    /**
     * Relationship for getting user_history
     *
     * @return HasMany
     **/
    public function userHistory(): HasMany
    {
        return $this->hasMany(UserHistory::class, 'permission_id', 'id');
    }

}
