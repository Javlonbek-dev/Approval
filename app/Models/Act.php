<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Act extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'act_date',
        'act_number',
        'order_id',
        'status_id',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(Executor::class, 'act_executor');
    }

    public function attach_files(): HasMany
    {
        return $this->hasMany(Attach_Files::class);
    }
}
