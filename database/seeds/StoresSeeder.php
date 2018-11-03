<?php

use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => 'store X',
            'address' => 'somewhere in Kyoto',
        ]);

        DB::table('stores')->insert([
            'name' => 'store Y',
            'address' => 'somewhere in Fukushima',
        ]);

        DB::table('stores')->insert([
            // same name(store B in America)
            'name' => 'store Z',
            'address' => 'somewhere in Tokyo',
        ]);
    }
}
