<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Machine\MachineRepositoryInterface;

class MachineService
{
    private $machine;

    public function __construct(MachineRepositoryInterface $machine) {
        $this->machine = $machine;
    }

    public function getBaseDataByMachineNo($store_id, $m_no, $date) {
        return $this->machine->getBaseDataByMachineNo($store_id, $m_no, $date);
    }

    public function getHitsDataByMachineNo($store_id, $machine_id, $date) {
        return $this->machine->getHitsDataByMachineNo($store_id, $machine_id, $date);
    }

    public function getMachinesListByStoreID($store_id) {
        return $this->machine->getMachinesListByStoreID($store_id);
    }

    public function getHistoryDataById($store_id, $machine_id, $date) {
        return $this->machine->getHistoryDataById($store_id, $machine_id, $date);
    }
    
}
