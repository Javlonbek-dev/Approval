<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Conclusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_out',
        'number_in',
        'date_out',
        'date_in',
        'act_id'
    ];

    public function act():BelongsTo
    {
        return $this->belongsTo(Act::class);
    }

    public function relations():HasMany
    {
        return $this->hasMany(Relation::class);
    }
}
