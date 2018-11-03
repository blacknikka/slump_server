<?php
declare(strict_types=1);

namespace App\DataProvider\Ranking;

interface RankingRepositoryInterface
{
    /**
     * ランキング作成
     */
    public function makeRankingData($date);
}
