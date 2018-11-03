<?php

use Illuminate\Database\Seeder;

class MachinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // store A
        DB::table('machines')->insert([
            'store_id' => 1,
            'number' => 1,
            'machine_id' => 1,
            'rasp_id' => 'aaa',
        ]);
        DB::table('machines')->insert([
            'store_id' => 1,
            'number' => 2,
            'machine_id' => 2,
            'rasp_id' => 'bbb',
        ]);
        DB::table('machines')->insert([
            'store_id' => 1,
            'number' => 3,
            'machine_id' => 3,
            'rasp_id' => 'ccc',
        ]);

        // store B(America)
        DB::table('machines')->insert([
            'store_id' => 2,
            'number' => 1,
            'machine_id' => 3,
            'rasp_id' => 'ddd',
        ]);
        DB::table('machines')->insert([
            'store_id' => 2,
            'number' => 2,
            'machine_id' => 1,
            'rasp_id' => 'eee',
        ]);

        // store B(Tokyo)
        DB::table('machines')->insert([
            'store_id' => 3,
            'number' => 1,
            'machine_id' => 3,
            'rasp_id' => 'fff',
        ]);
        DB::table('machines')->insert([
            'store_id' => 3,
            'number' => 2,
            'machine_id' => 3,
            'rasp_id' => 'ggg',
        ]);
    }
}
