<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number_in',
        'number_out',
        'date_in',
        'date_out',
        'approval_count',
        'created_by',
        'updated_by',
    ];
    protected $dates = ['deleted_at'];


    public function contract(): HasOne
    {
        return $this->hasOne(Contract::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function attach_files(): HasMany
    {
        return $this->hasMany(Attach_Files::class);
    }
}
