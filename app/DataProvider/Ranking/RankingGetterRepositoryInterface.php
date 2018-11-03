<?php
declare(strict_types=1);

namespace App\DataProvider\Ranking;

interface RankingGetterRepositoryInterface
{
    public function getRenRankingTotal($store_id);
    public function getRenRankingMonth($store_id, $year, $month);
    public function getPayRankingTotal($store_id);
    public function getPayRankingMonth($store_id, $year, $month);
}
