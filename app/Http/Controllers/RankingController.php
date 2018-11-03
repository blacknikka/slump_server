<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RankingService;
use Carbon\Carbon;

class RankingController extends Controller
{
    /** @var RankingService */
    private $ranking;

    public function __construct(RankingService $ranking) {
        $this->ranking = $ranking;
    }

    public function getRanking(Request $request) {
        $store_id = $request->store_id;
        $kind = $request->kind;

        if($kind === 'ren') {
            $data = $this->ranking->getRenRankingTotal($store_id);
        } else if($kind === 'pay') {
            $data = $this->ranking->getPayRankingTotal($store_id);
        } else if($kind === 'hit') {
        }

        return $data;
    }

    public function getRankingMonth(Request $request) {
        $store_id = $request->store_id;
        $kind = $request->kind;
        $date = $request->date;

        $carbon = new Carbon($date);
        $year = $carbon->year;
        $month = $carbon->month;

        if($kind === 'ren') {
            $data = $this->ranking->getRenRankingMonth($store_id, $year, $month);
        } else if($kind === 'pay') {
            $data = $this->ranking->getPayRankingMonth($store_id, $year, $month);
        } else if($kind === 'hit') {
        }

        return $data;
    }
}
