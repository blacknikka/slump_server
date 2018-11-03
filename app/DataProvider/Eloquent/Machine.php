<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'number',
        'machine_id',
    ];
}
