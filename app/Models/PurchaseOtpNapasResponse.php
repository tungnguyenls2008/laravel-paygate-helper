<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PurchaseOtpNapasResponse
 * @package App\Models
 * @version April 7, 2021, 7:06 am UTC
 *
 * @property integer $status
 * @property string $error_code
 * @property string $error_data
 * @property integer $order_amount
 * @property string $order_currency
 * @property string|\Carbon\Carbon $order_trans_time
 * @property string $order_trans_id
 * @property string $response_message
 * @property integer $response_acquirer_code
 * @property string $response_trans_status
 * @property string $source_of_fund_type
 * @property string $source_of_fund_provided_card_brand
 * @property string $source_of_fund_provided_card_scheme
 * @property string $source_of_fund_provided_card_name_on_card
 * @property string $source_of_fund_provided_card_issue_date
 * @property string $source_of_fund_provided_card_number
 * @property string $transaction_acquirer_id
 * @property string $transaction_acquirer_napas_trans_id
 * @property integer $transaction_amount
 * @property string $transaction_currency
 * @property string $transaction_type
 * @property string $transaction_id
 * @property string $channel
 * @property string $version
 * @property string $data_key
 * @property string $napas_key
 * @property integer $api_operation
 */
class PurchaseOtpNapasResponse extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'purchase_otp_napas_response';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'status',
        'error_code',
        'error_data',
        'error_message',
        'order_amount',
        'order_currency',
        'order_trans_time',
        'order_trans_id',
        'response_message',
        'response_acquirer_code',
        'response_trans_status',
        'source_of_fund_type',
        'source_of_fund_provided_card_brand',
        'source_of_fund_provided_card_scheme',
        'source_of_fund_provided_card_name_on_card',
        'source_of_fund_provided_card_issue_date',
        'source_of_fund_provided_card_number',
        'transaction_acquirer_id',
        'transaction_acquirer_napas_trans_id',
        'transaction_amount',
        'transaction_currency',
        'transaction_type',
        'transaction_id',
        'channel',
        'version',
        'data_key',
        'napas_key',
        'api_operation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'error_code' => 'string',
        'error_data' => 'string',
        'error_message' => 'string',
        'order_amount' => 'integer',
        'order_currency' => 'string',
        'order_trans_time' => 'datetime',
        'order_trans_id' => 'string',
        'response_message' => 'string',
        'response_acquirer_code' => 'integer',
        'response_trans_status' => 'string',
        'source_of_fund_type' => 'string',
        'source_of_fund_provided_card_brand' => 'string',
        'source_of_fund_provided_card_scheme' => 'string',
        'source_of_fund_provided_card_name_on_card' => 'string',
        'source_of_fund_provided_card_issue_date' => 'string',
        'source_of_fund_provided_card_number' => 'string',
        'transaction_acquirer_id' => 'string',
        'transaction_acquirer_napas_trans_id' => 'string',
        'transaction_amount' => 'integer',
        'transaction_currency' => 'string',
        'transaction_type' => 'string',
        'transaction_id' => 'string',
        'channel' => 'string',
        'version' => 'string',
        'data_key' => 'string',
        'napas_key' => 'string',
        'api_operation' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'error_code' => 'required|string|max:12',
        'error_data' => 'nullable|string|max:500',
        'error_message' => 'nullable|string|max:200',
        'order_amount' => 'nullable|integer',
        'order_currency' => 'nullable|string|max:5',
        'order_trans_time' => 'nullable',
        'order_trans_id' => 'nullable|string|max:12',
        'response_message' => 'nullable|string|max:64',
        'response_acquirer_code' => 'nullable|integer',
        'response_trans_status' => 'nullable|string|max:24',
        'source_of_fund_type' => 'nullable|string|max:10',
        'source_of_fund_provided_card_brand' => 'nullable|string|max:10',
        'source_of_fund_provided_card_scheme' => 'nullable|string|max:12',
        'source_of_fund_provided_card_name_on_card' => 'nullable|string|max:24',
        'source_of_fund_provided_card_issue_date' => 'nullable|string|max:5',
        'source_of_fund_provided_card_number' => 'nullable|string|max:24',
        'transaction_acquirer_id' => 'nullable|string|max:24',
        'transaction_acquirer_napas_trans_id' => 'nullable|string|max:24',
        'transaction_amount' => 'nullable|integer',
        'transaction_currency' => 'nullable|string|max:5',
        'transaction_type' => 'nullable|string|max:16',
        'transaction_id' => 'nullable|string|max:12',
        'channel' => 'nullable|string|max:8',
        'version' => 'nullable|string|max:4',
        'data_key' => 'nullable|string|max:500',
        'napas_key' => 'nullable|string|max:1500',
        'api_operation' => 'nullable|integer',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
