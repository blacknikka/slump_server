<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hits_table_no',
        'hit_no',
        'count',
    ];
}
