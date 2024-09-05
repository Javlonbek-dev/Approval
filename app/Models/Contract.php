<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function application():BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
