<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Package;

class PackageOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all packages with their IDs and names from the packages table
        $packages = DB::table('packages')->get(['id', 'package_name']);

        if ($packages->isNotEmpty()) {
            $packageOptions = [];

            // Define package options for each package with their prices
            $allPackageOptions = [
                'NOVELTEL INBOUND' => [
                    ['option' => '1300', 'price' => 15],
                ],
                'Noveltel 3CX Hosted PBX' => [
                    ['option' => '3CX License and Hosting-Monthly', 'price' => 9],
                    ['option' => '3CX License and Hosting-Annual', 'price' => 22],
                    ['option' => '3CX Licence-Annual', 'price' => 18],
                    ['option' => '3CX Licence-Annual and Hosting-Monthly', 'price' => 9],
                    ['option' => '3CX Licence and Hosting Combined-Monthly', 'price' => 260],
                    ['option' => '3CX License Annual-No Charge', 'price' => 0],
                ],
                'Novel Tel 4G DATA [40GB]' => [
                    ['option' => 'Telstra Mobile Data 40 GB', 'price' => 13],
                ],
                'Noveltel Telstra Mobile V&D Manual' => [
                    ['option' => 'BURO 4G 1GB V&D MANUAL', 'price' => 15],
                ],
                'NOVEL TEL NBN DATA' => [
                    ['option' => 'NBN 12/1 Mbps', 'price' => 60],
                    ['option' => 'NBN 25/5 Mbps', 'price' => 70],
                    ['option' => 'NBN 50/20 Mbps', 'price' => 90],
                    ['option' => 'NBN 100/40 Mbps', 'price' => 110],
                ],
                'NovelTel NBN Data' => [
                    ['option' => 'NBN Bronze', 'price' => 54],
                    ['option' => 'NBN Silver', 'price' => 68.18],
                    ['option' => 'NBN Gold', 'price' => 80],
                    ['option' => 'NBN Platinum', 'price' => 100],
                    ['option' => 'NBN 12-Bundle', 'price' => 70],
                    ['option' => 'NBN 25-Bundle', 'price' => 80],
                    ['option' => 'NBN 50-Bundle', 'price' => 100],
                    ['option' => 'NBN 100-Bundle', 'price' => 120],
                ],
                'Novel Tel SIP Basic' => [
                    ['option' => 'Novel Tel Sip Basic', 'price' => 9.08],
                    ['option' => 'Novel Tel Sip Basic 2nd Number', 'price' => 9.08],
                ],
                'Novel Tel SIP Basic Plus' => [
                    ['option' => 'Novel Tel Sip Basic Plus', 'price' => 20],
                    ['option' => 'Novel Tel Sip Basic 2nd Number', 'price' => 20],
                ],
                'Novel Tel SIP Ultimate' => [
                    ['option' => 'Novel Tel SIP Ultimate', 'price' => 40],
                    ['option' => 'Novel Tel SIP Ultimate 2nd Number', 'price' => 40],
                ],
                'Novel NBN Voice Only' => [
                    ['option' => 'NBN Voice Only PAYG', 'price' => 40],
                    ['option' => 'NBN Component', 'price' => 15],
                ],
                'NOVEL TEL FIXED LINE BASIC' => [
                    ['option' => 'PSTN-Business and Fax Access', 'price' => 40],
                ],
                'NOVEL TEL DSL BASIC PLUS' => [
                    ['option' => 'Z1 BASIC PLUS NO CONTRACT', 'price' => 60],
                    ['option' => 'Z1 BASIC PLUS 12 MONTH', 'price' => 70],
                    ['option' => 'Z1 BASIC PLUS 24 MONTH', 'price' => 80],
                    ['option' => 'Z2/3 BASIC PLUS NO CONTRACT', 'price' => 90],
                    ['option' => 'Z2/3 BASIC PLUS 12 MONTH', 'price' => 100],
                    ['option' => 'Z 2/3 BASIC PLUS 24 MONTH', 'price' => 110],
                ],
                'NovelTel NBN Voice Only-Unlimited' => [
                    ['option' => 'NBN Voice Only-Unlimited', 'price' => 30],
                    ['option' => 'NBN Component', 'price' => 15],
                ],
                'NovelTel NBN Bundle SIP' => [
                    ['option' => 'NBN Bundle SIP', 'price' => 0],
                ],
                'NOVEL TEL LOCAL FIXED LINE' => [
                    ['option' => 'PSTN-Business and Fax Access', 'price' => 40],
                ],
                'NOVEL TEL NATIONAL FIXED LINE' => [
                    ['option' => 'PSTN-Business and Fax Access', 'price' => 50],
                ],
                'NOVEL TEL TOTAL FIXED LINE' => [
                    ['option' => 'PSTN-Business and Fax Access', 'price' => 60],
                ],
                'NOVEL TEL PLATINUM FIXED LINE' => [
                    ['option' => 'PSTN-Business and Fax Access', 'price' => 70],
                ],
                'NOVEL TEL FAX DUET' => [
                    ['option' => 'FAX DUET', 'price' => 30],
                ],
            ];

            foreach ($packages as $package) {
                if (isset($allPackageOptions[$package->package_name])) {
                    foreach ($allPackageOptions[$package->package_name] as $option) {
                        $packageOptions[] = [
                            'package_id' => $package->id,
                            'package_options' => $option['option'],
                            'price' => $option['price'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }

            // Insert data into the package_options table
            DB::table('package_options')->insert($packageOptions);
        }
    }
}
