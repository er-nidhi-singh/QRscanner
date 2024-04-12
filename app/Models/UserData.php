<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile_number',
        'district',
        'taluka',
        'village',
        'pin_code',
        'coupon_no',          
        'qr_code',          
        'location',          
        'device_information',          
        'user_id',          
    ];
    function userdataInfo() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
