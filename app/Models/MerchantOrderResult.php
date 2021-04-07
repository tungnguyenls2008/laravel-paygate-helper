<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MerchantOrderResult
 * @package App\Models
 * @version April 7, 2021, 2:38 am UTC
 *
 * @property string $input
 * @property string $result_code
 * @property string $checkout_url
 * @property string $token_code
 * @property string $result_message
 */
class MerchantOrderResult extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'merchant_order_result';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'input',
        'result_code',
        'checkout_url',
        'token_code',
        'result_message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'input' => 'string',
        'result_code' => 'string',
        'checkout_url' => 'string',
        'token_code' => 'string',
        'result_message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'input' => 'required|string|max:500',
        'result_code' => 'required|string|max:8',
        'checkout_url' => 'nullable|string|max:100',
        'token_code' => 'nullable|string|max:100',
        'result_message' => 'required|string|max:50',
        'created_at' => 'nullable'
    ];

    
}
