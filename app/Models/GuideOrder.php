<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GuideOrder extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guide_orders';

    /**
     * The table date format
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'created_user_id',
        'accepted_user_id',
        'edit_user_id',
        'city_id',
        'work_experience',
        'excursions',
        'about',
        'comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'created_user_id' => 'integer',
        'accepted_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'city_id' => 'integer',
        'work_experience' => 'string',
        'excursions' => 'string',
        'about' => 'string',
        'comment' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Relationship for getting created user
     *
     * @return HasOne
     */
    public function createdUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_user_id')->with('role');
    }

    /**
     * Relationship for getting created user
     *
     * @return HasOne
     */
    public function acceptedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'accepted_user_id')->with('role');
    }

    /**
     * Relationship for getting created user
     *
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id')->with('role');
    }

}
