<?php
declare(strict_types=1);

namespace App\DataProvider\Client;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\DataProvider\Client\ClientData;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * set base data
     */
    public function setBaseGameData($data) {
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        $machine = ClientData::IsCorrectRaspId($data['id']);
        if($machine === null) {
            return [
                'result' => false,
            ];
        }

        $row = DB::table('machines')
            ->where('machines.rasp_id', '=', $data['id'])
            ->join('daily_machines', function($join) {
                $join->on('machines.store_id', '=', 'daily_machines.store_id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            })
            ->whereDate('daily_machines.date', '=', $now)
            ->select('daily_machines.id as d_id', 'daily_machines.hits_table_no')
            ->first();

        $ret = false;
        if($row) {
            // データがある場合

            // 機種テーブルの更新
            $result = DB::table('daily_machines')
                ->where('daily_machines.id', '=', $row->d_id)
                ->update([
                    'setting' => $data['setting'],
                    'games' => $data['game'],
                    'max' => $data['ren'],
                    'in' => $data['in'],
                    'out' => $data['out'],
                    'date' => $now,
                ]);

            // 大当たり情報の更新
            foreach($data['hits'] as $hit) {
                $this->setHitsCount($row->hits_table_no, $hit['hitNo'], $hit['count']);
            }

            $ret = true;
        } else {
            // データがないので新規登録
            $hits_table_no = $this->getColumnMax('hits_table_no');
            $slump_table_no = $this->getColumnMax('slump_table_no');
            $hit_historiy_table_no = $this->getColumnMax('hit_historiy_table_no');

            $result = DB::table('daily_machines')
                ->insert([
                    'store_id' => $machine->store_id,
                    'machine_no' => $machine->number,
                    'setting' => $data['setting'],
                    'games' => $data['game'],
                    'max' => $data['ren'],
                    'in' => $data['in'],
                    'out' => $data['out'],
                    'hits_table_no' => $hits_table_no + 1,
                    'slump_table_no' => $slump_table_no + 1,
                    'hit_historiy_table_no' => $hit_historiy_table_no + 1,
                ]);

            // 大当たり情報の更新
            foreach($data['hits'] as $hit) {
                $this->setHitsCount($hits_table_no + 1, $hit['hitNo'], $hit['count']);
            }

            $ret = true;
        }

        return [
            'result' => $ret,
        ];
    }

    private function getColumnMax($column) {
        $max = DB::table('daily_machines')
            ->max($column);

        return $max;
    }

    private function setHitsCount($table_no, $hit_no, $count) {
        $data = DB::table('hits')
            ->where('hits.hits_table_no', '=', $table_no)
            ->where('hits.hit_no', '=', $hit_no)
            ->count();
        
        if($data === 0) {
            $result = DB::table('hits')
                ->insert([
                    'hits_table_no' => $table_no,
                    'hit_no' => $hit_no,
                    'count' => $count,
                ]);
        } else {
            $result = DB::table('hits')
                ->where('hits.hits_table_no', '=', $table_no)
                ->where('hits.hit_no', $hit_no)
                ->update([
                    'count' => $count,
                ]);
        }
    }
}
