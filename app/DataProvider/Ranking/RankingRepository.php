<?php
declare(strict_types=1);

namespace App\DataProvider\Ranking;

use Illuminate\Support\Facades\DB;
use App\DataProvider\Ranking\RankingType;

use Carbon\Carbon;

class RankingRepository implements RankingRepositoryInterface
{
    /**
     * ランキング作成
     */
    public function makeRankingData($date) {
        $carbon = new Carbon($date);
        $year = $carbon->year;
        $month = $carbon->month;

        // store list
        $stores = $this->getStoreIDList();

        // 店のID分繰り返す
        foreach($stores as $store) {
            // トランザクション
            DB::transaction(function() use ($store, $year, $month){
                // 登録データを削除(total, month)
                $this->deleteRankingItems(
                    $store->id,
                    RankingType::getType('ren'),
                    $year,
                    $month);

                // total
                $totalmax = $this->getMaxRen($store->id, RankingType::getSpan('total'));

                foreach($totalmax as $data) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('ren'), RankingType::getSpan('total'), $data);
                }

                // month
                $monthmax = $this->getMaxRen($store->id, RankingType::getSpan('month'), $year, $month);

                foreach($monthmax as $data) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('ren'), RankingType::getSpan('month'), $data);
                }
            });

            // PAY
            DB::transaction(function() use ($store, $year, $month){
                // delete
                $this->deleteRankingItems(
                    $store->id,
                    RankingType::getType('pay'),
                    $year,
                    $month);

                $pay = $this->getMaxPay($store->id, RankingType::getSpan('total'));
                foreach($pay as $p) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('pay'), RankingType::getSpan('total'), $p);
                }

                $pay = $this->getMaxPay($store->id, RankingType::getSpan('month'), $year, $month);
                foreach($pay as $p) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('pay'), RankingType::getSpan('month'), $p);
                }

            });

            // hit
            DB::transaction(function() use ($store, $year, $month){
                // delete
                $this->deleteRankingItems(
                    $store->id,
                    RankingType::getType('hit'),
                    $year,
                    $month);

                $pay = $this->getMaxHit($store->id, RankingType::getSpan('total'));
                foreach($pay as $p) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('hit'), RankingType::getSpan('total'), $p);
                }

                $pay = $this->getMaxHit($store->id, RankingType::getSpan('month'), $year, $month);
                foreach($pay as $p) {
                    // データを登録する
                    $this->insertRankingItem(RankingType::getType('hit'), RankingType::getSpan('month'), $p);
                }

            });
        }
    }

    /**
     * 店のリストを取得する
     *
     * @return void
     */
    private function getStoreIDList() {
        $stores = DB::table('stores')
            ->select('id')
            ->get();

        return $stores;
    }

    private function getMaxRen($id, $span, $year = null, $month = null) {
        $max = DB::table('stores')
            ->where('stores.id', '=', $id)
            ->join('daily_machines', 'stores.id', '=', 'daily_machines.store_id');

        // monthの場合には条件を追加する
        if($span === RankingType::getSpan('month')) {
            $max->whereYear('daily_machines.date', '=', $year)
            ->whereMonth('daily_machines.date', '=', $month);
        }

        $result = $max->join('machines', function ($join) {
                $join->on('machines.store_id', '=', 'stores.id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            })
            ->join('machine_masters', 'machine_masters.id', '=', 'machines.machine_id')
            ->select(
                'stores.id as store_id',
                'daily_machines.machine_no',
                'daily_machines.max as score',
                'daily_machines.in',
                'daily_machines.out',
                'machine_masters.name',
                'daily_machines.date'
                 )
            ->orderBy('daily_machines.max', 'desc')
            ->limit(10)
            ->get();

        return $result;
    }

    private function getMaxPay($id, $span, $year = null, $month = null) {
        $max = DB::table('stores')
            ->where('stores.id', '=', $id)
            ->join('daily_machines', 'stores.id', '=', 'daily_machines.store_id');

        // monthの場合には条件を追加する
        if($span === RankingType::getSpan('month')) {
            $max->whereYear('daily_machines.date', '=', $year)
            ->whereMonth('daily_machines.date', '=', $month);
        }

        $result = $max->join('machines', function ($join) {
                $join->on('machines.store_id', '=', 'stores.id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            })
            ->join('machine_masters', 'machine_masters.id', '=', 'machines.machine_id')
            ->whereRaw(DB::raw('daily_machines.out / daily_machines.in > 1'))
            ->select(
                'stores.id as store_id',
                'daily_machines.machine_no',
                'daily_machines.in',
                'daily_machines.out',
                'machine_masters.name',
                'daily_machines.date',
                DB::raw('daily_machines.out - daily_machines.in as score')
                )
            ->orderBy('score', 'dest')
            ->limit(10)
            ->get();

        return $result;
    }

    private function getMaxHit($id, $span, $year = null, $month = null) {
        $max = DB::table('stores')
            ->where('stores.id', '=', $id)
            ->join('daily_machines', 'stores.id', '=', 'daily_machines.store_id');

            // monthの場合には条件を追加する
            if($span === RankingType::getSpan('month')) {
                $max->whereYear('daily_machines.date', '=', $year)
                ->whereMonth('daily_machines.date', '=', $month);
            }

        $result = $max->join('machines', function ($join) {
                $join->on('machines.store_id', '=', 'stores.id');
                $join->on('machines.number', '=', 'daily_machines.machine_no');
            })
            ->join('machine_masters', 'machine_masters.id', '=', 'machines.machine_id')
            // ->join('hits', function ($join) {
            //     $join->on('hits.hits_table_no', '=', 'daily_machines.hits_table_no');
            // })
            ->select(
                'stores.id as store_id',
                'daily_machines.machine_no',
                'daily_machines.max as score',
                'daily_machines.in',
                'daily_machines.out',
                'machine_masters.name',
                'daily_machines.date'
            )
            ->orderBy('score', 'dest')
            ->limit(10)
            ->get();

        return $result;
    }

    /**
     * DBにランキングデータを登録する（１件）
     *
     * @param integer $type
     * @return void
     */
    private function insertRankingItem($type, $span, $data) {
        DB::table('rankings')
        ->insert([
            'type' => $type,
            'ranking_span' => $span,
            'store_id' => $data->store_id,
            'machine_no' => $data->machine_no,
            'score' => $data->score,

            'name' => $data->name,
            'date' => $data->date,
        ]);
    }

    /**
     * データを削除する
     *
     * @param integer $store_id
     * @param integer $type
     * @param integer $year
     * @param integer $month
     * @return void
     */
    private function deleteRankingItems($store_id, $type, $year, $month) {
        // 月データを削除
        $query = $this->getRankingQueryByIdType($store_id, $type);
        $delete = $query
            ->where('rankings.ranking_span', '=', RankingType::getSpan('month'))
            ->whereYear('rankings.date', $year)
            ->whereMonth('rankings.date', $month)
            ->delete();

        // トータルデータ削除
        $query = $this->getRankingQueryByIdType($store_id, $type);
        $delete = $query
            ->where('rankings.ranking_span', '=', RankingType::getSpan('total'))
            ->delete();
    }

    private function getRankingQueryByIdType($store_id, $type) {
        $query = DB::table('rankings')
            ->where('rankings.store_id', '=', $store_id)
            ->where('rankings.type', '=', $type);

        return $query;
    }
}
