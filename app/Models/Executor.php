<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'execution_id'];
}
