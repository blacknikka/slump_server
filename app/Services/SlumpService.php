<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Slump\SlumpRepositoryInterface;

class SlumpService
{
    private $Slump;

    public function __construct(SlumpRepositoryInterface $Slump) {
        $this->Slump = $Slump;
    }

    public function getSlumpDataByMachineNo($store_id, $m_no, $date) {
        return $this->Slump->getSlumpDataByMachineNo($store_id, $m_no, $date);
    }
}
