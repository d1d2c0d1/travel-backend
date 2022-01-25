<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

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
        'status',
        'created_user_id',
        'owner_user_id',
        'edit_user_id',
        'accepted_user_id',
        'company_id',
        'country_id',
        'region_id',
        'city_id',
        'area_id',
        'category_id',
        'price_type_id',
        'type_id',
        'price',
        'name',
        'code',
        'description',
        'image',
        'views',
        'reviews',
        'likes',
        'favorites',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'created_user_id' => 'integer',
        'owner_user_id' => 'integer',
        'edit_user_id' => 'integer',
        'accepted_user_id' => 'integer',
        'company_id' => 'integer',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'area_id' => 'integer',
        'category_id' => 'integer',
        'price_type_id' => 'integer',
        'type_id' => 'integer',
        'price' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'description' => 'string',
        'image' => 'string',
        'views' => 'integer',
        'reviews' => 'integer',
        'likes' => 'integer',
        'favorites' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
