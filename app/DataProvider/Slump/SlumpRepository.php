<?php
declare(strict_types=1);

namespace App\DataProvider\Slump;

use Illuminate\Support\Facades\DB;
use \App\DataProvider\Eloquent\Slump;
use \App\DataProvider\Eloquent\Store;

use Carbon\Carbon;

class SlumpRepository implements SlumpRepositoryInterface
{
    private $slump;

    public function __construct(Slump $slump) {
        $this->slump = $slump;
    }

    /**
     * スランプ情報を取得する
     */
    public function getSlumpDataByMachineNo($store_id, $machine_no, $date) {
        $carbon = new Carbon($date);
        $carbon = $carbon->format('Y-m-d');
        $results = DB::table('daily_machines')
            ->where('daily_machines.store_id', '=', $store_id)
            ->where('daily_machines.machine_no', '=', $machine_no)
            ->whereDate('daily_machines.date', '=', $carbon)
            ->join('machines', function ($join) {
                $join->on('machines.store_id', '=', 'daily_machines.store_id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            })
            ->join('slumps', 'slumps.slump_table_no', '=', 'daily_machines.slump_table_no')
            ->select('slumps.data_number', 'slumps.amount')
            ->get();

        $ret = [];
        foreach ($results as $result) {
            $ret[] = [
                'data_number' => $result->data_number,
                'amount' => $result->amount,
            ];
        }

        return $ret;
    }
}
