<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificCaseType extends Model
{

    protected $table = "corruption_cases_specific_case_types";


    protected $fillable = ['corruption_case_id', 'name',];

}
