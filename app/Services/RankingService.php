<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Ranking\RankingRepositoryInterface;
use App\DataProvider\Ranking\RankingGetterRepositoryInterface;

class RankingService
{
    /**
     * @var RankingRepositoryInterface
     */
    private $ranking;

    /**
     * @var RankingGetterRepositoryInterface
     */
    private $rankingGetter;

    public function __construct(RankingRepositoryInterface $ranking, RankingGetterRepositoryInterface $rankingGetter) {
        $this->ranking = $ranking;
        $this->rankingGetter = $rankingGetter;
    }

    public function makeRankingData($date) {
        return $this->ranking->makeRankingData($date);
    }

    public function getRenRankingTotal($store_id) {
        return $this->rankingGetter->getRenRankingTotal($store_id);
    }

    public function getRenRankingMonth($store_id, $year, $month) {
        return $this->rankingGetter->getRenRankingMonth($store_id, $year, $month);
    }

    public function getPayRankingTotal($store_id) {
        return $this->rankingGetter->getPayRankingTotal($store_id);
    }

    public function getPayRankingMonth($store_id, $year, $month) {
        return $this->rankingGetter->getPayRankingMonth($store_id, $year, $month);
    }
}
