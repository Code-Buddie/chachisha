<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\County;
use App\Models\Constituency;

class CountyConstituencySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Nairobi' => ['Starehe', 'Westlands', 'Makadara'],
            'Elgeyo Marakwet' => ['Marakwet West', 'Keiyo South'],
        ];

        foreach ($data as $countyName => $constituencies) {
            $county = County::create(['name' => $countyName, 'code'=> 047, 'country_id'=> 1]);

            foreach ($constituencies as $constituencyName) {
                Constituency::create([
                    'county_id' => $county->id,
                    'constituency_name' => $constituencyName,
                ]);
            }
        }
    }
}

