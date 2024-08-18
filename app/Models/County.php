<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'status'];


    public function constituencies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contituency::class, 'id');
    }
}
