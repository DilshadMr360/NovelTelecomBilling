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
        $serviceOptions = DB::table('service_options')->get();

        if ($serviceOptions->isNotEmpty()) {
            // Define packages for each service option
            $allPackages = [
                'Optus 1300/1800' => ['NOVELTEL INBOUND'],
                'Comms Code 1300/1800' => [],
                'AAPT 13/1300' => ['NOVELTEL INBOUND'],
                'AAPT 1800' => ['NOVELTEL INBOUND'],
                '3CX Hosted' => ['Noveltel 3CX Hosted PBX'],
                'Telstra Mobile Symbio' => ['Novel Tel 4G DATA [40GB]', 'Noveltel Telstra Mobile V&D Manual'],
                'Superloop NBN' => ['NOVEL TEL NBN DATA', 'NovelTel NBN Data'],
                'AAPT NBN' => ['NOVEL TEL NBN DATA', 'NovelTel NBN Data'],
                'IP Express' => ['Novel Tel SIP Basic', 'Novel Tel SIP Basic Plus', 'Novel Tel SIP Ultimate', 'Novel NBN Voice Only', 'NOVEL TEL FIXED LINE BASIC', 'NOVEL TEL DSL BASIC PLUS', 'NovelTel NBN Voice Only-Unlimited', 'NovelTel NBN Bundle SIP'],
                'PSTN' => ['NOVEL TEL NBN DATA', 'NOVEL TEL LOCAL FIXED LINE', 'NOVEL TEL NATIONAL FIXED LINE', 'NOVEL TEL TOTAL FIXED LINE', 'NOVEL TEL PLATINUM FIXED LINE', 'NOVEL TEL FIXED LINE BASIC', 'NOVEL TEL DSL BASIC PLUS', 'NOVEL TEL DSL NATIONAL PLUS', 'NOVEL TEL DSL LOCAL PLUS', 'NOVEL TEL DSL TOTAL PLUS', 'NOVEL TEL FAX DUET'],
            ];

            $packages = [];
            foreach ($serviceOptions as $serviceOption) {
                if (isset($allPackages[$serviceOption->service_types])) {
                    foreach ($allPackages[$serviceOption->service_types] as $package) {
                        $packages[] = [
                            'service_id' => $serviceOption->id,
                            'package_name' => $package,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }

            DB::table('packages')->insert($packages);
        }
    
}
}
