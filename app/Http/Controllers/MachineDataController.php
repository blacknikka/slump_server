<?php

namespace App\Http\Controllers;

use App\Services\MachineService;
use App\Services\MachineMasterService;
use Illuminate\Http\Request;

class MachineDataController extends Controller
{
    private $machine;
    private $master;

    public function __construct(MachineService $machine, MachineMasterService $master) {
        $this->machine = $machine;
        $this->master = $master;
    }

    /**
     * 遊技台Noから基本遊技データを取得する
     *
     * @param Request $request
     * @return void
     */
    public function getBaseDataByMachineNo(Request $request) {
        $m_no = (int)$request->machine_no;
        $store_id = (int)$request->store_id;

        if(isset($request->date)) {
            $date = $request->date;
        } else {
            $date = null;
        }
        $data = $this->machine->getBaseDataByMachineNo($store_id, $m_no, $date);

        $ret = [
            'store_id' => $store_id ? $store_id: null,
            'machine_id' => $m_no ? $m_no: null,
            'data' => $data,
        ];
        return $ret;
        // echo '<pre>' . var_export($ret, true) . '</pre>';
    }

    /**
     * 遊技台Noから遊技機の大当たりデータを取得する
     *
     * @param Request $request
     * @return void
     */
    public function getHitsDataByMachineNo(Request $request) {
        $m_no = (int)$request->machine_no;
        $store_id = (int)$request->store_id;
        $date = $request->date;
        $data = $this->machine->getHitsDataByMachineNo($store_id, $m_no, $date);

        $ret = [
            'store_id' => $store_id ? $store_id: null,
            'machine_id' => $m_no ? $m_no: null,
            'date' => $date,
            'data' => $data,
        ];
        return $ret;
        // echo '<pre>' . var_export($ret, true) . '</pre>';
    }

    /**
     * store_idからmachinesの一覧を取得
     *
     * @param Request $request
     * @return void
     */
    public function getMachinesListByStoreID(Request $request) {
        $store_id = (int)$request->store_id;
        $data = $this->machine->getMachinesListByStoreID($store_id);

        $master = $this->master->getMachineMasterByStoreID($store_id);
        return [
            'store_id' => $store_id ? $store_id: null,
            'data' => $data,

            // マスターデータ（機種マスター）
            'master' => $master,
        ];
    }
}
