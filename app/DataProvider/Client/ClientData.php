<?php
declare(strict_types=1);

namespace App\DataProvider\Client;

use Illuminate\Support\Facades\DB;


class ClientData
{
    public static function IsCorrectRaspId($id) {
        $row = DB::table('machines')
            ->where('machines.rasp_id', '=', $id)
            ->first();

        if($row) {
            return $row;
        } else {
            return null;
        }
    }
}
