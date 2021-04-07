<?php

namespace App\Repositories;

use App\Models\PurchaseOtpNapasRequest;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseOtpNapasRequestRepository
 * @package App\Repositories
 * @version April 7, 2021, 7:01 am UTC
*/

class PurchaseOtpNapasRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return PurchaseOtpNapasRequest::class;
    }
}
