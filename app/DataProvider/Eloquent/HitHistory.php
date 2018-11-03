<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class HitHistory extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'hit_historiy_table_no',
        'game_count',
        'hit_no',
    ];
}
