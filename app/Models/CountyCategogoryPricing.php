<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountyCategogoryPricing extends Model
{
    use HasFactory;
    protected $table = 'county_categogory_pricing';

    protected $fillable = ['service_name','budget_cost', 'ranking'];
}


// INSERT INTO county_categogory_pricing (service_name, sector_id, budget_cost, county_id, ranking, created_at, updated_at) VALUES
// ('School Construction and Equipment', 2, 2212601, 1, 2, NOW(), NOW()),
// ('Hospital Construction and Equipment', 4, 2244887, 1, 1, NOW(), NOW()),
// ('Road Construction', 1, 36392511, 1, 3, NOW(), NOW()),
// ('Water and Sanitation Projects', 4, 24895163, 1, 4, NOW(), NOW()),
// ('Markets (Construction and Rehabilitation)', 1, 838000, 1, 5, NOW(), NOW()),
// ('Stadiums (Construction and Rehabilitation)', 3, 6000000, 1, 6, NOW(), NOW()),
// ('Fire Stations (Construction)', 1, 5000000, 1, 7, NOW(), NOW());