<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalysisPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Average Time Taken to Conclude Cases',
            'Outcomes on Case Type',
            'Outcome of Specific Case Types by Country',
            'Amounts Recovered on Case Types and Specific Case Types',
            'Offices Involved',
            'Levels of Officials Involved',
            'Affected Public Sectors',
        ];

        foreach ($statuses as $status) {
            DB::table('analysis_points')->insert([
                'name' => $status,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
