<?php
declare(strict_types=1);

namespace App\DataProvider\Machine;

interface MachineRepositoryInterface
{
    /**
     * 基本データをmachine IDから取得
     */
    public function getBaseDataByMachineNo($store_id, $machine_id, $date);

    /**
     * 大当たりデータをmachine IDから取得
     */
    public function getHitsDataByMachineNo($store_id, $machine_id, $date);

    /**
     * データをstore IDから取得（複数データ）
     */
    public function getMachinesListByStoreID($store_id);

    /**
     * 大当たり履歴
     */
    public function getHistoryDataById($store_id, $machine_id, $date);
}
