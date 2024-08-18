<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisPoints extends Model
{
    use HasFactory;

    protected $table = 'analysis_points';

    protected $fillable = ['name', 'status'];
}
