<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class UserHistory
 *
 * @package App\Models
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property integer $permission_id
 * @property integer $status
 * @property string $additional
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserHistory whereUserId($value)
 * @mixin \Eloquent
 */
class UserHistory extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_history';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table date format
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

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

        'role_id',
        'permission_id',
        'status',
        'additional',

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
        'user_id' => 'integer',
        'role_id' => 'integer',
        'permission_id' => 'integer',
        'status' => 'integer',
        'additional' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];


    /**
     * Relationship for connection with User model (table)
     *
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
