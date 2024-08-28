<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'program_id',
        'contract_id'
    ];

    public function executors():BelongsToMany
    {
        return $this->belongsToMany(Executor::class);
    }
}
