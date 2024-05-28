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

            // Define service options for each service
            $allServiceOptions = [
                '1300/1800' => ['Optus 1300/1800', 'Comms Code 1300/1800', 'AAPT 13/1300', 'AAPT 1800'],
                'Data' => ['Synchronous Data', 'LBNNCo Fast Fiber', 'AAPT 5G Fixed Wireless', 'Opticomm Fast Fiber', 'Fixed Wireless', 'Telstra DSL', 'Static Back Up', 'Fax to Email', 'Optus EWAN'],
                'Hardware' => ['Hardware', 'Hardware Bundle'],
                'Hosted PBX' => ['Hosted PBX', 'HOSTED PBX Extension', '3CX Hosted', '3CX Extenstion', '3CX Hosted Bundle', 'Vodia Hosted PBX', 'Vodia Hosted PBX Extension', 'Vodia Hosted PBX Extension', 'Hardware Hosted Bundle'],
                'Mobile' => ['Telstra Mobile Symbio', 'Telstra Mobile Symbio(eSIM)', 'Telstra Broadband Symbio(MBB)', 'Telstra Broadband Symbio(eSIM)', 'Telstra Mob Data Poll (Parent)', 'Telstra Mobile Data Pool Service', 'Telstra Data Pool Service (eSIM)', 'Virtual Mobile'],
                'NBN' => ['Superloop NBN', 'AAPT NBN', 'NBN Satelite', 'NBN Backup(Mobile Components)', 'NBN Enterprise Ethnernet'],
                'Professional Services' => ['Managed Service', 'Support as Service', 'Fieldwork', 'Domain Hosting', 'Co Location','Software Licence'],
                'Voice' => ['IP Express', 'IP Express Non-primary', 'PSTN', 'BusroSIP Primary', 'BusroSIP Non-Primary','BusroSIP Bundle','BuroPhone','IP Express Bundle','BuroPhone(Mobile Component)','BuroLine','BuroLine(NBN Components)','Teams DID','Teams Trunk'],
                'ZArchive' => ['Amcom Voice Primary', 'Asterisk Hosted Express', 'Asterrisk Hosted Express Non Prim', 'Bundled Voice & Data Service'],
            ];

            // Loop through service IDs and assign corresponding options
            foreach ($serviceIds as $index => $serviceId) {
                $serviceName = array_keys($allServiceOptions)[$index];
                foreach ($allServiceOptions[$serviceName] as $option) {
                    $serviceOptions[] = [
                        'service_id' => $serviceId,
                        'service_types' => $option,
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
