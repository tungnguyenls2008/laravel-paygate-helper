<?php

namespace App\Repositories;

use App\Models\MerchantOrder;
use App\Repositories\BaseRepository;

/**
 * Class MerchantOrderRepository
 * @package App\Repositories
 * @version April 6, 2021, 9:55 am UTC
*/

class MerchantOrderRepository extends BaseRepository
{
    protected $orderable = [
        'created_at',
    ];
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MerchantOrder::class;
    }
    

}
