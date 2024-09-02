<?php

namespace Modules\Fuel\Repositories;

use Modules\Fuel\Entities\Pump;
use Modules\Fuel\Repositories\BaseRepository;

/**
 * Class PumpRepository
 * @package Modules\Fuel\Repositories
 * @version November 25, 2021, 10:23 am UTC
*/

class PumpRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'name'
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
        return Pump::class;
    }
}
