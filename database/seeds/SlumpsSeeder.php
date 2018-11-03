<?php

use Illuminate\Database\Seeder;

class SlumpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => -50,
            'data_number' => 1,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => 10,
            'data_number' => 2,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => 30,
            'data_number' => 3,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => -100,
            'data_number' => 4,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => 800,
            'data_number' => 5,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 1,
            'amount' => 0,
            'data_number' => 6,
        ]);

        // 
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => 20,
            'data_number' => 1,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => 300,
            'data_number' => 2,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => -200,
            'data_number' => 3,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => 13,
            'data_number' => 4,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => 700,
            'data_number' => 5,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 2,
            'amount' => -30,
            'data_number' => 6,
        ]);

        // 
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 0,
            'data_number' => 1,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 90,
            'data_number' => 2,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 0,
            'data_number' => 3,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 50,
            'data_number' => 4,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 60,
            'data_number' => 5,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 3,
            'amount' => 0,
            'data_number' => 6,
        ]);

        // 
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 0,
            'data_number' => 1,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 0,
            'data_number' => 2,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 0,
            'data_number' => 3,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 0,
            'data_number' => 4,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 0,
            'data_number' => 5,
        ]);
        DB::table('slumps')->insert([
            'slump_table_no' => 4,
            'amount' => 10,
            'data_number' => 6,
        ]);
    }
}
