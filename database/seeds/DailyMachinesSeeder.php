<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyMachinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon('2018-10-12');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 1,
            'machine_no' => 1,
            'setting' => 1,
            'games' => 540,
            'max' => 13,
            'in' => 7508,
            'out' => 8205,

            'hits_table_no' => 1,
            'slump_table_no' => 1,
            'hit_historiy_table_no' => 1,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-11');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 1,
            'machine_no' => 1,
            'setting' => 4,
            'games' => 25,
            'max' => 1,
            'in' => 500,
            'out' => 2000,

            'hits_table_no' => 2,
            'slump_table_no' => 2,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-10');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 1,
            'machine_no' => 2,
            'setting' => 6,
            'games' => 150,
            'max' => 1,
            'in' => 100,
            'out' => 250,

            'hits_table_no' => 3,
            'slump_table_no' => 3,
            'hit_historiy_table_no' => 3,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-12');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 1,
            'machine_no' => 3,
            'setting' => 2,
            'games' => 1000,
            'max' => 11,
            'in' => 100,
            'out' => 10000,

            'hits_table_no' => 4,
            'slump_table_no' => 4,
            'hit_historiy_table_no' => 4,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-8');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 2,
            'machine_no' => 1,
            'setting' => 1,
            'games' => 10000,
            'max' => 30,
            'in' => 50000,
            'out' => 49000,

            'hits_table_no' => 5,
            'slump_table_no' => 5,
            'hit_historiy_table_no' => 5,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-7');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 2,
            'machine_no' => 2,
            'setting' => 5,
            'games' => 20000,
            'max' => 15,
            'in' => 45000,
            'out' => 20000,

            'hits_table_no' => 6,
            'slump_table_no' => 6,
            'hit_historiy_table_no' => 6,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-16');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 3,
            'machine_no' => 1,
            'setting' => 1,
            'games' => 15000,
            'max' => 10,
            'in' => 4000,
            'out' => 3000,

            'hits_table_no' => 7,
            'slump_table_no' => 7,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-10-15');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 3,
            'machine_no' => 2,
            'setting' => 3,
            'games' => 300,
            'max' => 0,
            'in' => 5000,
            'out' => 20,

            'hits_table_no' => 8,
            'slump_table_no' => 8,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-9-15');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 3,
            'machine_no' => 1,
            'setting' => 1,
            'games' => 3200,
            'max' => 20,
            'in' => 6000,
            'out' => 12000,

            'hits_table_no' => 8,
            'slump_table_no' => 8,
            'date' => $format,
        ]);

        $carbon = new Carbon('2018-9-15');
        $format = $carbon->format('Y/m/d');
        DB::table('daily_machines')->insert([
            'store_id' => 1,
            'machine_no' => 1,
            'setting' => 3,
            'games' => 300,
            'max' => 40,
            'in' => 5000,
            'out' => 20,

            'hits_table_no' => 8,
            'slump_table_no' => 8,
            'date' => $format,
        ]);
    }
}
