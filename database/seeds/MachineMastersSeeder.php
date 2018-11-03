<?php

use Illuminate\Database\Seeder;

class MachineMastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machine_masters')->insert([
            'name' => 'MachineA',
        ]);

        DB::table('machine_masters')->insert([
            'name' => 'MachineB',
        ]);

        DB::table('machine_masters')->insert([
            'name' => 'MachineC',
        ]);
    }
}
