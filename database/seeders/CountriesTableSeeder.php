<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Kenya' => ['code' => '+254', 'abbr' => 'KE'],
        ];

        foreach ($countries as $countryName => $countryData) {
            DB::table('countries')->insert([
                'name' => $countryName,
                'code' => $countryData['code'],
                'abbr' => $countryData['abbr'],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
