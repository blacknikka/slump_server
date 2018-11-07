<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MachineService;

class HistoryController extends Controller
{
    private $machine;

    public function __construct(MachineService $machine)
    {
        $this->machine = $machine;
    }

    /**
     * 履歴を取得する
     *
     * @param Request $request
     * @return void
     */
    public function getHistoryDataById(Request $request, $store_id, $machine_no, $date)
    {
        $data = $this->machine->getHistoryDataById($store_id, $machine_no, $date);

        $ret = [
            'store_id' => $store_id ? $store_id: null,
            'machine_id' => $machine_no ? $machine_no: null,
            'date' => $date ? $date: null,
            'data' => $data,
        ];
        return $ret;
        // echo '<pre>' . var_export($ret, true) . '</pre>';
    }
}
