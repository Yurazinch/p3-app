<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Correction extends Model
{
    protected $fillable = ['term', 'urgency_id', 'correction'];

    protected function urgencys(): BelongsTo
    {
        return belongsTo(Urgency::class);
    }
}
