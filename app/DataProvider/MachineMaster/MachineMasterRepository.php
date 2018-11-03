<?php
declare(strict_types=1);

namespace App\DataProvider\MachineMaster;

use Illuminate\Support\Facades\DB;

use \App\DataProvider\Eloquent\MachineMaster;
use \App\DataProvider\Eloquent\Store;
use Carbon\Carbon;

class MachineMasterRepository implements MachineMasterRepositoryInterface
{
    private $master;

    public function __construct(MachineMaster $master) {
        $this->master = $master;
    }

    /**
     * 店舗の日付データから関連する機種マスターデータを取得
     */
    public function getMachineMasterByStoreID($store_id) {
        $query = DB::table('stores')
            ->where('stores.id', '=', $store_id)
            ->join('machines', 'machines.store_id', '=', 'stores.id')
            ->join('machine_masters', 'machines.machine_id', '=', 'machine_masters.id')
            ->select('machines.machine_id', 'machine_masters.name');
        $results = $query->distinct()->get();

        return $results;
    }
}
