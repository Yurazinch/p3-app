<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Urgency extends Model
{
    protected $table = 'urgencys';
    protected $fillable = ['name'];

    protected function work(): BelongsTo
    {
        return $this->belongsTo(Work::class);
    }
}
