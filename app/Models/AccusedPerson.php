<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class AccusedPerson extends Model
{
    protected $table = 'accused_persons';

    protected $fillable = ['case_id','first_name', 'last_name', 'middle_name', 'gender', 'employer', 'level', 'image_url'];

    public function charges()
    {
        return $this->hasMany(Charges::class, 'person_id');
    }

    public function corruptionCases()
    {
        return $this->hasMany(CorruptionCase::class, 'case_id');
    }

    public function rank()
    {
        return $this->belongsTo(AccusedPersonLevel::class, 'level');
    }

    // Mutator to encrypt the person's name before saving
//    public function setFirstNameAttribute($value)
//    {
//        $this->attributes['first_name'] = Crypt::encryptString($value);
//    }
//
//    public function setLastNameAttribute($value)
//    {
//        $this->attributes['last_name'] = Crypt::encryptString($value);
//    }
//
//    public function setMiddleNameAttribute($value)
//    {
//        $this->attributes['middle_name'] = !empty($value) ? Crypt::encryptString($value) : null;
//    }

}
