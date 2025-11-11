<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = [
        'name',
    ];

    //relaties
    public function rocks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        //een op veel
        return $this->hasMany(Rock::class);
    }
}
