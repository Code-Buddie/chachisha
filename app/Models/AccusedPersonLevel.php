<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccusedPersonLevel extends Model
{
    use HasFactory;

    protected $table = "accused_persons_level";

    protected $fillable = ['name', 'status'];

    public function accusedPersons()
    {
        return $this->hasMany(AccusedPerson::class, 'level');
    }

    public function getNumberOfCases()
    {
        $count = 0;
        foreach ($this->accusedPersons() as $accusedPerson) {
            foreach ($accusedPerson->charges as $charge) {
                $count++;
            }
        }

        return $count;
    }

    public function getNumberOfCasesByType()
    {
        $casesByType = $this->cases->groupBy('case_id')->map(function ($cases) {
            return $cases->first();
        });

        return $casesByType->count();
    }
}
