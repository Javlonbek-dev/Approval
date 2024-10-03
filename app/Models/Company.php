<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Company extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'parent_id',
        'name',
        'phone',
        'address',
        'stir',
        'dbit_id',
        'ifut_id',
        'manager',
        'region_id',
        'thsht_id'
    ];

    public array $translatable = [
        'name',
        'address',
        'manager',
    ];
    protected $dates = ['deleted_at'];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function laboratories(): HasMany
    {
        return $this->hasMany(Laboratory::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function thsht(): BelongsTo
    {
        return $this->belongsTo(Thsht::class);
    }

    public function ifut(): BelongsTo
    {
        return $this->belongsTo(Ifut::class);
    }

    public function dbit(): BelongsTo
    {
        return $this->belongsTo(Dbit::class);
    }
}
