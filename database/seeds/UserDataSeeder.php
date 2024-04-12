<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserData;


class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserData::create([
            'user_id' => '2',
            'name' => 'Super',
            'mobile_number' => '97656354',
            'district' => 'satna',
            'taluka' => 'test',
            'village' => 'test',
            'pin_code' => '765667',
            'coupon_no' => '65667',
            'qr_code' => 'test',
            'location' => 'test',
            'device_information' => 'test',
        ]);
    
    }
}
