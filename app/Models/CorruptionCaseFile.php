<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorruptionCaseFile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'report_id', 'name', 'original_name','full_path' ];

    public function report(){
        return $this->belongsTo(CorruptionCase::class, 'report_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
