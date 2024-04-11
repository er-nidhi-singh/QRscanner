<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PluckingData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'spraying_date', 
        'plucking_date', 
    ];
}
