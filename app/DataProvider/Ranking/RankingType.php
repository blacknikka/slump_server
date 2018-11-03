<?php
declare(strict_types=1);

namespace App\DataProvider\Ranking;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RankingType
{
    private static $type = [
        'ren' => 1,
        'pay' => 2,
        'hit' => 3,
    ];

    private static $span = [
        'total' => 1,
        'month' => 2,
    ];

    public static function getType($type) {
        $ret = self::$type[$type];
        return $ret;
    }

    public static function getSpan($span) {
        $ret = self::$span[$span];
        return $ret;
    }

}
