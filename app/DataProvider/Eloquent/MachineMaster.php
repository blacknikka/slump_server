<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class MachineMaster extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
