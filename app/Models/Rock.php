<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rock extends Model
{
    protected $fillable = [
        'name',
        'type',
        'color',
        'hardness',
        'category',
        'description',
    ];

    //relaties
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(User::class);
    }
}
