<?php
declare(strict_types=1);

namespace App\DataProvider\Image;

use Illuminate\Support\Facades\DB;


class ImageRepository implements ImageRepositoryInterface
{
    /**
     * image取得
     */
    public function getImageByName($machine_id, $hit_name) {
        $result = DB::table('hit_masters')
            ->where('hit_masters.machine_id', '=', $machine_id)
            ->where('hit_masters.name', '=', $hit_name)
            ->select('hit_masters.icon_path')
            ->first();

        $p = $result->icon_path;
        $path = storage_path() . '/images/' . $p;

        if (\File::exists($path)) {
            return $path;
        } else {
            return null;
        }
    }
}
