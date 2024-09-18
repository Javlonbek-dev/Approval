<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ifut extends Model
{
    use HasFactory;

    protected $table = 'ifuts';
    protected $fillable = ['name_extend', 'code'];
}
