<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'comment',
        'user_id',
        'rock_id',
    ];

    //relaties
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function rock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Rock::class);
    }
}
