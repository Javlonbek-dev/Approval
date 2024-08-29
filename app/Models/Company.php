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
        'parent_id',
        'name',
        'phone',
        'address',
        'stir',
        'dbit',
        'ifut',
        'manager',
        'region_id',
        'thsht_id'
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

    public function thsht():BelongsTo
    {
        return $this->belongsTo(Thsht::class);
    }
}
