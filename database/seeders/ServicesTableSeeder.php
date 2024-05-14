<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define services data
        $services = [];

        // Add 20 services
        for ($i = 1; $i <= 10; $i++) {
            $services[] = [
                'service_name' => 'Service ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the services table
        DB::table('services')->insert($services);
    }
}
