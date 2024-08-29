<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approval extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ownership(): BelongsTo
    {
        return $this->belongsTo(Ownership::class);
    }

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }
}
