<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Illicit enrichment',
            'Bribery and extortion',
            'Embezzlement, misappropriation, or other diversion',
            'Abuse of functions, including abuse of office, nepotism, patronage, cronyism, etc.',
            'Money Laundering',
            'Fraud',
            'Forgery and use of forgeries ',
            'Asset recovery, to include non-conviction-based forfeitures and/or civil forfeiture of criminal assets.',
            'Grand Corruption',
            'Influence peddling/trading in influence',
            'Access to justice for marginalized ',
        ];

        foreach ($statuses as $status) {
            DB::table('case_types')->insert([
                'name' => $status,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
