<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\MachineMaster\MachineMasterRepositoryInterface;

class MachineMasterService
{
    private $master;

    public function __construct(MachineMasterRepositoryInterface $master) {
        $this->master = $master;
    }

    public function getMachineMasterByStoreID($store_id) {
        return $this->master->getMachineMasterByStoreID($store_id);
    }
}
