<?php

use Illuminate\Database\Seeder;

class HitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        DB::table('hits')->insert([
            'hits_table_no' => 1,
            'hit_no' => 1,
            'count' => 10,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 1,
            'hit_no' => 2,
            'count' => 5,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 1,
            'hit_no' => 3,
            'count' => 0,
        ]);

        // 
        DB::table('hits')->insert([
            'hits_table_no' => 2,
            'hit_no' => 1,
            'count' => 1,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 2,
            'hit_no' => 2,
            'count' => 2,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 2,
            'hit_no' => 3,
            'count' => 5,
        ]);

        // 
        DB::table('hits')->insert([
            'hits_table_no' => 3,
            'hit_no' => 1,
            'count' => 1,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 3,
            'hit_no' => 2,
            'count' => 10,
        ]);

        // 
        DB::table('hits')->insert([
            'hits_table_no' => 4,
            'hit_no' => 1,
            'count' => 7,
        ]);

        // 
        DB::table('hits')->insert([
            'hits_table_no' => 5,
            'hit_no' => 1,
            'count' => 7,
        ]);
        DB::table('hits')->insert([
            'hits_table_no' => 5,
            'hit_no' => 2,
            'count' => 20,
        ]);
    }
}
