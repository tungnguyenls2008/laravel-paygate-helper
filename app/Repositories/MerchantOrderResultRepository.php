<?php

namespace App\Repositories;

use App\Models\MerchantOrderResult;
use App\Repositories\BaseRepository;

/**
 * Class MerchantOrderResultRepository
 * @package App\Repositories
 * @version April 7, 2021, 2:38 am UTC
*/

class MerchantOrderResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'input',
        'result_code',
        'checkout_url',
        'token_code',
        'result_message'
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
        return MerchantOrderResult::class;
    }
}
