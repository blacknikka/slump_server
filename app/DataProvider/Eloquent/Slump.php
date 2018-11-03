<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Slump extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slump_table_no',
        'amount',
        'data_number',
    ];
}
