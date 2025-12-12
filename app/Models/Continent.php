<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Continent extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
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
