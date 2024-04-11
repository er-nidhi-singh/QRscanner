<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDate extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_no',
        'product',
        'lot_no',
        
    ];
}
