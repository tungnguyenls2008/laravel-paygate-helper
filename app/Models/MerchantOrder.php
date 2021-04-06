<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MerchantOrder
 * @package App\Models
 * @version April 6, 2021, 9:55 am UTC
 *
 * @property string $merchant_site_code
 * @property string $merchant_key
 * @property string $order_code
 * @property string $method_code
 * @property string $bank_code
 * @property string $order_description
 * @property integer $amount
 * @property string $currency
 * @property string $language
 * @property string $buyer_fullname
 * @property string $buyer_email
 * @property string $buyer_mobile
 * @property string $buyer_address
 * @property integer $time_limit
 * @property string $return_url
 * @property string $cancel_url
 * @property string $notify_url
 */
class MerchantOrder extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'merchant_order';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'merchant_site_code',
        'merchant_key',
        'order_code',
        'method_code',
        'bank_code',
        'order_description',
        'amount',
        'currency',
        'language',
        'buyer_fullname',
        'buyer_email',
        'buyer_mobile',
        'buyer_address',
        'time_limit',
        'return_url',
        'cancel_url',
        'notify_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'merchant_site_code' => 'string',
        'merchant_key' => 'string',
        'order_code' => 'string',
        'method_code' => 'string',
        'bank_code' => 'string',
        'order_description' => 'string',
        'amount' => 'integer',
        'currency' => 'string',
        'language' => 'string',
        'buyer_fullname' => 'string',
        'buyer_email' => 'string',
        'buyer_mobile' => 'string',
        'buyer_address' => 'string',
        'time_limit' => 'integer',
        'return_url' => 'string',
        'cancel_url' => 'string',
        'notify_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'merchant_site_code' => 'required|string|max:10',
        'merchant_key' => 'required|string|max:32',
        'order_code' => 'required|string|max:32',
        'method_code' => 'max:10',
        'bank_code' => 'max:10',
        'order_description' => 'required|string|max:240',
        'amount' => 'required|integer',
        'currency' => 'required|string|max:8',
        'language' => 'required|string|max:24',
        'buyer_fullname' => 'required|string|max:64',
        'buyer_email' => 'required|string|max:64',
        'buyer_mobile' => 'required|string|max:16',
        'buyer_address' => 'required|string|max:240',
        'time_limit' => 'string',
        'return_url' => 'required|string|max:512',
        'cancel_url' => 'required|string|max:512',
        'notify_url' => 'required|string|max:512'
    ];


}
