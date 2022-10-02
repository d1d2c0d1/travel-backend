<?php

namespace App\Models;

use App\Types\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
     * The append attributes (custom attributes)
     *
     * @var array
     */
    protected $appends = [
        'extended_status'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'status',
        'client_name',
        'date_from',
        'date_to',
        'phone',
        'email',
        'is_processing',
        'is_payment',
        'price',
        'tickets',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'item_id' => 'integer',
        'status' => 'integer',
        'is_processing' => 'boolean',
        'is_payment' => 'boolean',
        'price' => 'integer',
        'tickets' => 'integer',
        'client_name' => 'string',
        'phone' => 'integer',
        'date_from' => 'datetime:Y-m-d H:i:s',
        'date_to' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Getting extended status attribute
     *
     * @return OrderStatus
     */
    public function getExtendedStatusAttribute(): OrderStatus
    {
        return new OrderStatus($this->status);
    }

    /**
     * Relationship for getting item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'item_id')->with('properties')->with('tags')->with('categories');
    }

    /**
     * Relationship for getting user
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id')->with('role');
    }

    /**
     * Relationship for getting order type
     *
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this->hasOne(OrderType::class, 'id', 'type_id');
    }
}
