<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'program_id'
    ];

    protected $dates =['deleted_at'];

    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(Executor::class, 'order_executor');
    }

    public function program():BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

}
