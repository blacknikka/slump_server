<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class DailyMachine extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'machine_no',
        'setting',
        'games',
        'max',
        'in',
        'out',
        'hits_table_no',
        'slump_table_no',
        'date',
    ];
}
