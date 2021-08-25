<?php

namespace Database\Seeders;

use App\Models\SpeedtestProvider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpeedtestProvider::firstOrCreate([
            'name' => 'speedtest.pl',
        ]);

        SpeedtestProvider::firstOrCreate([
            'name' => 'speedtest.net',
        ]);
    }
}
