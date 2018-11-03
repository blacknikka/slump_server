<?php
declare(strict_types=1);

namespace App\DataProvider\Slump;

interface SlumpRepositoryInterface
{
    /**
     * データをIDから取得
     */
    public function getSlumpDataByMachineNo($store_id, $m_no, $date);
}
