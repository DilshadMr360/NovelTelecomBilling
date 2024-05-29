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
        // Fetch all packages from the packages table
        $packages = Package::all();

        // Define package options data based on packages
        $packageOptions = [];
        foreach ($packages as $package) {
            $packageOptions[] = [
                'package_id' => $package->id,
                'package_options' => 'Options for ' . $package->package_name, // Example package options
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the package_options table
        DB::table('package_options')->insert($packageOptions);
    }
}
