<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';

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
     *
     * Date format im model
     *
     **/
    protected $dateFormat = "Y-m-d H:i:s";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_resolved',
        'user_id',
        'phone',
        'email',
        'ip',
        'user_agent',
        'question',
        'created_at',
        'updated_at'
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
        'is_resolved' => 'boolean',
        'user_id' => 'integer',
        'phone' => 'string',
        'email' => 'string',
        'ip' => 'string',
        'user_agent' => 'string',
        'question' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Relationship for getting User
     *
     * @return HasOne
     **/
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id')->with('role')->with('type')->with('company');
    }
}
