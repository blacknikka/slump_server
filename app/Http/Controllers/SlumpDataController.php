<?php

namespace App\Http\Controllers;

use App\Services\SlumpService;
use Illuminate\Http\Request;

class SlumpDataController extends Controller
{
    private $slump;

    public function __construct(SlumpService $slump) {
        $this->slump = $slump;
    }

    /**
     * スランプデータの取得処理
     */
    public function getSlumpDataByMachineNo(Request $request) {
        $store_id = $request->store_id;
        $m_no = $request->machine_no;
        $date = $request->date;
        $data = $this->slump->getSlumpDataByMachineNo($store_id, $m_no, $date);

        $ret = [
            'store_id' => $store_id ? $store_id: null,
            'machine_id' => $m_no ? $m_no: null,
            'date' => $date,
            'data' => $data,
        ];
        return $ret;
        // echo '<pre>' . var_export($ret, true) . '</pre>';
    }
}
