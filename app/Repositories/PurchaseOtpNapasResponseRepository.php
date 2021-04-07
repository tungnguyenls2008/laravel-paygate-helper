<?php

namespace App\Repositories;

use App\Models\PurchaseOtpNapasResponse;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseOtpNapasResponseRepository
 * @package App\Repositories
 * @version April 7, 2021, 7:06 am UTC
*/

class PurchaseOtpNapasResponseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return PurchaseOtpNapasResponse::class;
    }
}
