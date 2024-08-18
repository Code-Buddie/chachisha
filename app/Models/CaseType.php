<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function casesCount()
    {
        return $this->cases()->count();
    }

    public function cases()
    {
        return $this->belongsToMany(CorruptionCase::class, 'corruption_cases_case_types', 'case_type_id', 'corruption_case_id');
    }


}
