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
        $serviceNames = [
            '1300/1800', 'Data', 'Hardware', 'Hosted PBX', 'Mobile', 'NBN', 'Professional Services', 'Voice', 'ZArchive'
        ];
        $services = [];

         // Loop through the service names and add them to the services array
         foreach ($serviceNames as $name) {
            $services[] = [
                'service_name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the services table
        DB::table('services')->insert($services);
    }
}
