<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Executor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'execution_id'];

    public function programs():BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }

    public function execution():BelongsTo
    {
        return $this->belongsTo(Execution::class);
    }
}
