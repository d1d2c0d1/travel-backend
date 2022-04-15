<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * Class Review
 *
 * @package App\Models
 * @property integer $id
 * @property integer $created_user_id
 * @property integer $accepted_user_id
 * @property integer $edit_user_id
 * @property integer $status
 * @property mixed $item_id
 * @property integer $rating
 * @property string $comment
 * @property array $gallery
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Models\User|null $acceptedUser
 * @property-read \App\Models\User|null $createdUser
 * @property-read \App\Models\User|null $editedUser
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAcceptedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereEditUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Review extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
        'accepted_user_id',
        'edit_user_id',
        'status',
        'item_id',
        'rating',
        'comment',
        'gallery',
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
        'created_user_id' => 'integer',
        'accepted_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'status' => 'integer',
        'rating' => 'integer',
        'comment' => 'string',
        'gallery' => 'json',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [
        'created_user_id' => [],
        'accepted_user_id' => [],
        'edit_user_id' => [],
        'status' => [],
        'item_id' => [],
        'rating' => [],
        'comment' => [],
        'gallery' => [],
    ];

    /**
     * Relationship for getting user
     *
     * @return HasOne
     **/
    public function createdUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_user_id')->with('role');
    }

    /**
     * Relationship for getting user
     *
     * @return HasOne
     **/
    public function acceptedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'accepted_user_id')->with('role');
    }

    /**
     * Relationship for getting user
     *
     * @return HasOne
     **/
    public function editedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'edit_user_id')->with('role');
    }

    /**
     * Relationships for getting item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'item_id')->with('properties')->with('categories')->with('tags');
    }
}
