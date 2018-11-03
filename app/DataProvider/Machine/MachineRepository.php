<?php
declare(strict_types=1);

namespace App\DataProvider\Machine;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class MachineRepository implements MachineRepositoryInterface
{
    /**
     * 遊技台IDと日付情報からベース情報を取得する
     */
    public function getBaseDataByMachineNo($store_id, $machine_no, $date) {
        // 日付データを取得する（履歴）
        $dateList = DB::table('daily_machines')
            ->where('daily_machines.store_id', '=', $store_id)
            ->where('daily_machines.machine_no', '=', $machine_no)
            ->latest('date')
            ->select('daily_machines.date')
            ->limit(14)
            ->get();

        // 日付リストを配列に
        $dates = [];
        foreach ($dateList as $d) {
            $dates[] = $d->date;
        }

        $day;
        if($date === null) {
            // nullの場合には最新を取得する
            if($dateList->count()) {
                $day = $dateList[0]->date;
            } else {
                return null;
            }
        } else {
            $day = $date;
        }

        $query = $this->getBaseQuery($store_id, $machine_no, $day)
            ->join('machine_masters', 'machines.machine_id', '=', 'machine_masters.id')
            ->join('stores', 'stores.id', '=', 'daily_machines.machine_no')
            ->select(
                'machine_masters.name as machine_name',
                'daily_machines.games',
                'daily_machines.max',
                'daily_machines.in',
                'daily_machines.out',
                'daily_machines.date',
                'stores.name',
                'stores.address'
            );
        $result = $query->first();

        return [
            'machine_name' => $result->machine_name,
            'games' => $result->games,
            'max' => $result->max,
            'in' => $result->in,
            'out' => $result->out,
            'date' => $result->date,
            'name' => $result->name,
            'address' => $result->address,

            // 履歴情報（日付履歴）
            'dates' => $dates,
        ];
    }

    /**
     * 遊技台IDと日付情報から大当たり情報を取得する
     */
    public function getHitsDataByMachineNo($store_id, $machine_no, $date) {
        $query = $this->getBaseQuery($store_id, $machine_no, $date);
        $results = $query
            ->join('hits', 'hits.hits_table_no', '=', 'daily_machines.hits_table_no')
            ->join('hit_masters', function ($join) {
                $join->on('hit_masters.hit_no', '=', 'hits.hit_no');
                $join->on('hit_masters.machine_id', '=', 'machines.machine_id');
            })
            ->select('hit_masters.name', 'hit_masters.type', 'hits.count')
            ->get();

        $ret = [];
        foreach ($results as $result) {
            $ret[] = [
                // $result
                'name' => $result->name,
                'type' => $result->type,
                'count' => $result->count,
            ];
        }

        return $ret;
    }

    /**
     * 店IDから遊技台の一覧を取得する
     */
    public function getMachinesListByStoreID($store_id) {
        $results = DB::table('machines')
            ->where('store_id', '=', $store_id)
            ->select('machines.store_id', 'machines.number', 'machines.machine_id')
            ->get();

        $ret = [];
        foreach ($results as $result) {
            $ret[] = [
                'number' => $result->number,
                'machine_id' => $result->machine_id,
            ];
        }

        return $ret;
    }

    /**
     * 大当たり履歴情報を取得する
     */
    public function getHistoryDataById($store_id, $machine_no, $date) {
        $query = $this->getBaseQuery($store_id, $machine_no, $date);
        $results = $query
            ->join('hit_histories', 'hit_histories.hit_historiy_table_no', '=', 'daily_machines.hit_historiy_table_no')
            ->join('hit_masters', function ($join) {
                $join->on('hit_masters.hit_no', '=', 'hit_histories.hit_no');
                $join->on('hit_masters.machine_id', '=', 'machines.machine_id');
            })
            ->select('hit_histories.game_count', 'hit_masters.name')
            ->orderBy('hit_histories.game_count')
            ->get();

        return $results;
    }

    /**
     * 基本となるクエリを取得
     * 指定されたmachine_no、日付dateが等しいものを結合した情報
     *
     * @param integer $machine_no
     * @param string $date
     * @return object
     */
    private function getBaseQuery($store_id, $machine_no, $date) {
        $carbon = new Carbon($date);
        $carbon = $carbon->format('Y-m-d');
        $query = DB::table('daily_machines')
            ->where('daily_machines.store_id', '=', $store_id)
            ->where('daily_machines.machine_no', '=', $machine_no)
            ->whereDate('daily_machines.date', '=', $carbon)
            ->join('machines', function ($join) {
                $join->on('machines.store_id', '=', 'daily_machines.store_id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            });

        return $query;
    }
}
