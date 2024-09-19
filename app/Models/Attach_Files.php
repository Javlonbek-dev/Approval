<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attach_Files extends Model
{
    use HasFactory;

    protected $table = 'attach_files';
    protected $casts = ['file' => 'array'];

    protected $fillable = ['application_id', 'act_id', 'file_type', 'file'];


    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
