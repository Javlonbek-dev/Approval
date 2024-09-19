<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'order_date',
        'program_id',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at'];

    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(Executor::class, 'order_executor');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

}
