<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'continent', 'status'];


    public function countries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Country::class, 'id');
    }

}
