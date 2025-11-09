<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
