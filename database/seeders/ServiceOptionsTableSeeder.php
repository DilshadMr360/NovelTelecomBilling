<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve existing service IDs from the services table
        $serviceIds = DB::table('services')->pluck('id')->toArray();

        // Ensure that serviceIds array is not empty before proceeding
        if (!empty($serviceIds)) {
            // Define service options data
            $serviceOptions = [];

            // Define the number of additional options per service
            $additionalOptionsPerService = 5;

            // Loop through service IDs and generate service options
            foreach ($serviceIds as $serviceId) {
                for ($i = 1; $i <= $additionalOptionsPerService; $i++) {
                    $serviceOptions[] = [
                        'service_id' => $serviceId,
                        'service_types' => 'Service Option ' . ($i + $additionalOptionsPerService * ($serviceId - 1)),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            // Insert service options data into the service_options table
            DB::table('service_options')->insert($serviceOptions);
        }
    }
}
