<?php

use Illuminate\Database\Seeder;

class HitMastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // machine A
        DB::table('hit_masters')->insert([
            'machine_id' => 1,
            'hit_no' => 1,

            'name' => 'BigBonus',
            'type' => 'Normal',
            'icon_path' => 'icon1.png',
        ]);
        DB::table('hit_masters')->insert([
            'machine_id' => 1,
            'hit_no' => 2,

            'name' => 'RegularBonus',
            'type' => 'Normal',
            'icon_path' => 'icon2.png',
        ]);
        DB::table('hit_masters')->insert([
            'machine_id' => 1,
            'hit_no' => 3,

            'name' => 'SpecialTime',
            'type' => 'ART',
            'icon_path' => 'icon3.png',
        ]);

        // machine B
        DB::table('hit_masters')->insert([
            'machine_id' => 2,
            'hit_no' => 1,

            'name' => 'Bonus',
            'type' => 'Normal',
            'icon_path' => 'icon4.png',
        ]);
        DB::table('hit_masters')->insert([
            'machine_id' => 2,
            'hit_no' => 2,

            'name' => 'SuperBonus',
            'type' => 'Normal',
            'icon_path' => 'icon5.png',
        ]);

        // machine C
        DB::table('hit_masters')->insert([
            'machine_id' => 3,
            'hit_no' => 1,

            'name' => 'SuperUltraRush',
            'type' => 'ART',
            'icon_path' => 'icon6.png',
        ]);
    }
}
