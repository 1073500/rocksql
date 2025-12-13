<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rock extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'type',
        'color',
        'hardness',
        'category',
        'description',
        'image',
        'user_id',
        'continent_id',
    ];

    //relaties
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function continent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
