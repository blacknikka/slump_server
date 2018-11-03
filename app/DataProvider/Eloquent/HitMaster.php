<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class HitMaster extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'machine_id',
        'hit_no',
        'name',
        'type',
    ];
}
