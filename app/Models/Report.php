<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function act(): BelongsTo
    {
        return $this->belongsTo(Act::class);
    }

    public function executor(): BelongsTo
    {
        return $this->belongsTo(Executor::class);
    }
}
