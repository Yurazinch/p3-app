<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discipline extends Model
{
    protected $fillable = ['chapter_id', 'name'];

    public function chapters(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
