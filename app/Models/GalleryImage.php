<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Carbon;

/**
 * Class GalleryImage
 * @package App\Models
 *
 * @property integer $id
 * @property integer $created_user_id
 * @property integer $gallery_id
 * @property string $src
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class GalleryImage extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gallery_image';

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
        'gallery_id',
        'src',
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
        'gallery_id' => 'integer',
        'src' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [
        'created_user_id' => [],
        'gallery_id' => [],
        'src' => [],
    ];


    /**
     * Relationship for getting gallery
     *
     * @return HasOne
     **/
    public function gallery(): HasOne
    {
        return $this->hasOne(Gallery::class, 'id', 'gallery_id');
    }

    /**
     * Relationship for getting user
     *
     * @return HasOne
     **/
    public function createdUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_user_id');
    }

}
