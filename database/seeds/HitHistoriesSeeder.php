<?php

use Illuminate\Database\Seeder;

class HitHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 20,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 200,
            'hit_no' => 2,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 500,
            'hit_no' => 3,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 1000,
            'hit_no' => 2,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 1200,
            'hit_no' => 3,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 2000,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 3000,
            'hit_no' => 2,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 4000,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 5000,
            'hit_no' => 3,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 6600,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 7000,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 1,
            'game_count' => 2000,
            'hit_no' => 1,
        ]);

        //
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 2,
            'game_count' => 100,
            'hit_no' => 1,
        ]);
        
        //
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 3,
            'game_count' => 2000,
            'hit_no' => 1,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 3,
            'game_count' => 2500,
            'hit_no' => 2,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 3,
            'game_count' => 3000,
            'hit_no' => 2,
        ]);
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 3,
            'game_count' => 4000,
            'hit_no' => 1,
        ]);

        //
        DB::table('hit_histories')->insert([
            'hit_historiy_table_no' => 4,
            'game_count' => 2000,
            'hit_no' => 1,
        ]);
    }
}
