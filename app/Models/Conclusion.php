<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_out',
        'number_in',
        'date_out',
        'date_in',
        'act_id'
    ];
}
