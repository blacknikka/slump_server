<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StoresSeeder::class);
        $this->call(MachineMastersSeeder::class);
        $this->call(MachinesSeeder::class);
        $this->call(DailyMachinesSeeder::class);
        $this->call(HitMastersSeeder::class);
        $this->call(HitsSeeder::class);
        $this->call(SlumpsSeeder::class);
        $this->call(HitHistoriesSeeder::class);
    }
}
