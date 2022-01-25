<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Carbon;

/**
 * Class Post
 * @package App\Models
 * @mixin Model
 *
 * @property integer $id
 * @property bool $is_main
 * @property bool $is_week
 * @property string $title
 * @property string $code
 * @property string $content
 * @property integer $user_id
 * @property integer $status
 * @property integer $views
 * @property integer $likes
 * @property integer $favorites
 * @property integer $comments
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $area_id
 * @property integer $language_id
 * @property integer $company_id
 * @property integer $category_id
 * @property string $image
 * @property string $seo_description
 * @property string $tags
 * @property Carbon $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
        'title',
        'is_main',
        'is_week',
        'code',
        'content',
        'status',
        'views',
        'likes',
        'favorites',
        'comments',
        'country_id',
        'region_id',
        'city_id',
        'area_id',
        'language_id',
        'company_id',
        'category_id',
        'user_id',
        'image',
        'seo_description',
        'tags',
        'published_at'
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
        'is_main' => 'boolean',
        'is_week' => 'boolean',
        'title' => 'string',
        'code' => 'string',
        'content' => 'string',
        'user_id' => 'integer',
        'status' => 'integer',
        'views' => 'integer',
        'likes' => 'integer',
        'favorites' => 'integer',
        'comments' => 'integer',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'area_id' => 'integer',
        'language_id' => 'integer',
        'company_id' => 'integer',
        'category_id' => 'integer',
        'image' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'seo_description' => 'string',
        'tags' => 'string',
        'published_at' => 'datetime:Y-m-d H:i:s',
    ];

    const RuleList = [

    ];


    /**
     * Relationship for getting user
     *
     * @return HasOne
     **/
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
