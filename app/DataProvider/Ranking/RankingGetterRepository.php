<?php
declare(strict_types=1);

namespace App\DataProvider\Ranking;

use Illuminate\Support\Facades\DB;
use App\DataProvider\Ranking\RankingType;


use Carbon\Carbon;

class RankingGetterRepository implements RankingGetterRepositoryInterface
{
    public function getRenRankingTotal($store_id) {
        $results = DB::table('rankings')
        ->where('rankings.store_id', '=', $store_id)
        ->where('rankings.type', '=', RankingType::getType('ren'))
        ->where('rankings.ranking_span', '=', RankingType::getSpan('total'))
        ->select(
            'rankings.machine_no',
            'rankings.score',
            'rankings.name',
            'rankings.date'
        )
        ->get();

        $ret = [];

        foreach($results as $result) {
            $ret[] = [
                'machine_no' => $result->machine_no,
                'score' => $result->score,
                'name' => $result->name,
                'date' => $result->date,
            ];
        }

        return $ret;
    }

    public function getRenRankingMonth($store_id, $year, $month) {
        $results = DB::table('rankings')
        ->where('rankings.store_id', '=', $store_id)
        ->where('rankings.type', '=', RankingType::getType('ren'))
        ->where('rankings.ranking_span', '=', RankingType::getSpan('total'))
        ->whereYear('rankings.date', '=', $year)
        ->whereMonth('rankings.date', '=', $month)
        ->select(
            'rankings.machine_no',
            'rankings.score',
            'rankings.name',
            'rankings.date'
        )
        ->get();

        $ret = [];

        foreach($results as $result) {
            $ret[] = [
                'machine_no' => $result->machine_no,
                'score' => $result->score,
                'name' => $result->name,
                'date' => $result->date,
            ];
        }

        return $ret;
    }

    public function getPayRankingTotal($store_id) {
        $results = DB::table('rankings')
        ->where('rankings.store_id', '=', $store_id)
        ->where('rankings.type', '=', RankingType::getType('pay'))
        ->where('rankings.ranking_span', '=', RankingType::getSpan('total'))
        ->select(
            'rankings.machine_no',
            'rankings.score',
            'rankings.name',
            'rankings.date'
        )
        ->get();

        $ret = [];

        foreach($results as $result) {
            $ret[] = [
                'machine_no' => $result->machine_no,
                'score' => $result->score,
                'name' => $result->name,
                'date' => $result->date,
            ];
        }

        return $ret;
    }

    public function getPayRankingMonth($store_id, $year, $month) {
        $results = DB::table('rankings')
        ->where('rankings.store_id', '=', $store_id)
        ->where('rankings.type', '=', RankingType::getType('pay'))
        ->where('rankings.ranking_span', '=', RankingType::getSpan('total'))
        ->whereYear('rankings.date', '=', $year)
        ->whereMonth('rankings.date', '=', $month)
        ->select(
            'rankings.machine_no',
            'rankings.score',
            'rankings.name',
            'rankings.date'
        )
        ->get();

        $ret = [];

        foreach($results as $result) {
            $ret[] = [
                'machine_no' => $result->machine_no,
                'score' => $result->score,
                'name' => $result->name,
                'date' => $result->date,
            ];
        }

        return $ret;
    }

}
