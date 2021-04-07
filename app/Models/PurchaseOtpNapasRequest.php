<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PurchaseOtpNapasRequest
 * @package App\Models
 * @version April 7, 2021, 7:01 am UTC
 *
 * @property string $transaction_id
 * @property string $order_id
 * @property string $api_operation
 * @property integer $order_amount
 * @property string $order_currency
 * @property string $order_reference
 * @property string $fund_type
 * @property string $card_number
 * @property string $issue_date
 * @property string $name_on_card
 * @property string $channel
 * @property string $client_ip
 * @property string $device_id
 * @property string $environment
 * @property string $card_scheme
 * @property string $enable_3d_secure
 */
class PurchaseOtpNapasRequest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'purchase_otp_napas_request';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'transaction_id',
        'order_id',
        'api_operation',
        'order_amount',
        'order_currency',
        'order_reference',
        'fund_type',
        'card_number',
        'issue_date',
        'name_on_card',
        'channel',
        'client_ip',
        'device_id',
        'environment',
        'card_scheme',
        'enable_3d_secure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaction_id' => 'string',
        'order_id' => 'string',
        'api_operation' => 'string',
        'order_amount' => 'integer',
        'order_currency' => 'string',
        'order_reference' => 'string',
        'fund_type' => 'string',
        'card_number' => 'string',
        'issue_date' => 'string',
        'name_on_card' => 'string',
        'channel' => 'string',
        'client_ip' => 'string',
        'device_id' => 'string',
        'environment' => 'string',
        'card_scheme' => 'string',
        'enable_3d_secure' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transaction_id' => 'required|string|max:12',
        'order_id' => 'required|string|max:12',
        'api_operation' => 'required|string|max:12',
        'order_amount' => 'required|integer',
        'order_currency' => 'required|string|max:5',
        'order_reference' => 'required|string|max:12',
        'fund_type' => 'required|string|max:12',
        'card_number' => 'required|string|max:24',
        'issue_date' => 'required|string|max:5',
        'name_on_card' => 'required|string|max:24',
        'channel' => 'required|string|max:12',
        'client_ip' => 'required|string|max:16',
        'device_id' => 'required|string|max:12',
        'environment' => 'required|string|max:12',
        'card_scheme' => 'required|string|max:12',
        'enable_3d_secure' => 'required|string|max:5',
        //'created_at' => 'required'
    ];


}
