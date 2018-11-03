<?php
declare(strict_types=1);

namespace App\DataProvider\MachineMaster;

interface MachineMasterRepositoryInterface
{
    /**
     * 店舗の日付データから関連する機種マスターデータを取得
     */
    public function getMachineMasterByStoreID($store_id);
}
