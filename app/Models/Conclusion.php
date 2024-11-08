<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conclusion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number_out',
        'number_in',
        'date_out',
        'date_in',
        'act_id',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at'];

    public function act(): BelongsTo
    {
        return $this->belongsTo(Act::class);
    }

    public function relations(): HasMany
    {
        return $this->hasMany(Relation::class);
    }

    public function executor(): BelongsTo
    {
        return $this->belongsTo(Executor::class);
    }
}
