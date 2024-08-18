<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfJudgement extends Model
{
    use HasFactory;

    protected $table = 'types_of_judgement';

    protected $fillable = ['name', 'status'];

}
