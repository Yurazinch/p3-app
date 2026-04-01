<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $fillable = ['term', 'urgency_id', 'correction'];

    protected function urgencys(): HasMany
    {
        return hasMany(Urgency::class);
    }
}
