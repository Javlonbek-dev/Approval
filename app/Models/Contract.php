<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contract_number',
        'contract_date',
        'employees_count',
        'days_count',
        'application_id',
        'status_id',
        'created_by',
        'updated_by',
    ];
    protected $dates = ['deleted_at'];


    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
