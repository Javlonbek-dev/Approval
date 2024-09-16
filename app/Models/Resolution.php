<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resolution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function conclusion():BelongsTo
    {
        return $this->belongsTo(Conclusion::class);
    }

    public function approval_company(): BelongsTo
    {
        return $this->belongsTo(Approval_Company::class);
    }

    public function relation_executor():BelongsToMany
    {
        return $this->belongsToMany(Executor::class, 'resolution_executor');
    }
}
