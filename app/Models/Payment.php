<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';

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

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'status',
        'invoice_id',
        'account_id',
        'item_id',
        'amount',
        'payment_at',
        'subscription_id',
        'payment_currency',
        'payment_amount',
        'currency',
        'card_first_six',
        'card_last_four',
        'card_type',
        'card_exp_date',
        'test_mode',
        'payment_status',
        'opperation_type',
        'token_recipient',
        'name',
        'email',
        'ip',
        'ip_country',
        'ip_city',
        'ip_region',
        'ip_district',
        'ip_latitude',
        'ip_longitude',
        'issuer',
        'issuer_bank_country',
        'description',
        'card_product',
        'payment_method',
        'data'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaction_id' => 'integer',
        'status' => 'integer',
        'invoice_id' => 'integer',
        'account_id' => 'integer',
        'item_id' => 'integer',
        'amount' => 'integer',
        'payment_at' => 'datetime:Y-m-d H:i:s',
        'subscription_id' => 'string',
        'payment_currency' => 'string',
        'payment_amount' => 'string',
        'currency' => 'string',
        'card_first_six' => 'string',
        'card_last_four' => 'string',
        'card_type' => 'string',
        'card_exp_date' => 'string',
        'test_mode' => 'string',
        'payment_status' => 'string',
        'opperation_type' => 'string',
        'token_recipient' => 'string',
        'name' => 'string',
        'email' => 'string',
        'ip' => 'string',
        'ip_country' => 'string',
        'ip_city' => 'string',
        'ip_region' => 'string',
        'ip_district' => 'string',
        'ip_latitude' => 'string',
        'ip_longitude' => 'string',
        'issuer' => 'string',
        'issuer_bank_country' => 'string',
        'description' => 'string',
        'card_product' => 'string',
        'payment_method' => 'string',
        'data' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Relationship for getting item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

    /**
     * Relationship for getting order
     *
     * @return HasOne
     */
    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'invoice_id');
    }

    /**
     * Relationship for getting payment user
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'account_id');
    }
}
