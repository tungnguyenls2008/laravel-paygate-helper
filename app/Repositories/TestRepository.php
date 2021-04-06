<?php

namespace App\Repositories;

use App\Models\Test;
use App\Repositories\BaseRepository;

/**
 * Class TestRepository
 * @package App\Repositories
 * @version April 6, 2021, 9:32 am UTC
*/

class TestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'string',
        'number',
        'boolean'
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
        return Test::class;
    }
}
