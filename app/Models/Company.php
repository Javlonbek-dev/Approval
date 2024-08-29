<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'stir',
        'dbit',
        'ifut',
        'manager'
    ];

    public function applications():HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function contacts():HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function laboratories():HasMany
    {
        return $this->hasMany(Laboratory::class);
    }

    public function region():BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
