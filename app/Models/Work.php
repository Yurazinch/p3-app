<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Work extends Model
{
    protected $fillable = ['name', 'pages', 'urgency_id'];

    protected function urgency(): HasOne
    {
        return $this->hasOne(Urgency::class);
    }
}
