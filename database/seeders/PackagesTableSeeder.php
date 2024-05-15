<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all services from the services table
        $services = Service::all();

        // Define package data based on services
        $packages = [];
        foreach ($services as $service) {
            $packages[] = [
                'service_id' => $service->id,
                'package_name' => 'Package for ' . $service->service_name, // Example package name
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the packages table
        DB::table('packages')->insert($packages);
    }
}
