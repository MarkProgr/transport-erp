<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Transport;
use Database\Factories\TransportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::factory()
            ->count(15)
            ->create();
    }
}
