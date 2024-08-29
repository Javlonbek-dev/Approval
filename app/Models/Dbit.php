<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbit extends Model
{
    use HasFactory;

    protected $fillable = ['name_extend', 'code'];
}
