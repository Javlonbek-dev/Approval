<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_number',
        'program_date',
        'assessment_period',
        'contract_id',
        'created_by',
        'updated_by',
    ];

    protected $datas = ['deleted_at'];

    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(Executor::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function program_executor(): BelongsToMany
    {
        return $this->belongsToMany(Executor::class, 'program_executor');
    }
}
