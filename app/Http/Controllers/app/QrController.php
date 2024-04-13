<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\FormData;
use App\Models\MasterDate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;





class QrController extends Controller
{
    //
    public function scanner(){
        return view('app.scanner');
    }

    public function verifyQr(Request $r){
        $checkInMaster = MasterDate::where('coupon_no', $r->couponno)->first();
        if($checkInMaster){
            return response()->json(['success' =>true, 'message' => 'Coupon verified'], 200);

        }
        return response()->json(['success' =>false, 'message' => 'Coupon invalid'], 200);

    }

    public function formView(){
        return view('qrapp.form');
    }


   // Import the User model

    public function formSave(Request $request) {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'district' => 'required|string',
            'taluka' => 'required|string',
            'village' => 'required|string',
            'pincode' => 'required|string',
            // You can add more validation rules as needed
        ]);
    
        // Check if a user with the provided mobile number exists
        try{
        $user = User::where('mobile', $validatedData['mobile'])->first();
    
        // If user does not exist, create a new user
        if (!$user) {
            $user = new User();
            $user->name = $validatedData['name'];
            $user->mobile = $validatedData['mobile'];
            $user->password = Hash::make("ajajajja");

            // You can add more fields as needed
            $user->save();
        }
    
        // Save form data with the appropriate user ID
        $userDetail = new FormData();
        $userDetail->user_id = $user->id;
        $userDetail->name = $validatedData['name'];
        $userDetail->mobile_number = $validatedData['mobile'];
        $userDetail->district = $validatedData['district'];
        $userDetail->taluka = $validatedData['taluka'];
        $userDetail->village = $validatedData['village'];
        $userDetail->pin_code = $validatedData['pincode'];
        // You can add more fields as needed
        $userDetail->save();
    
        return response()->json(['success' =>true, 'message' => 'Form data saved successfully'], 200);

    } catch(\Exception $e){
        return response()->json(['success' => false,'message' => 'Something went wrong', 'message' => $e->getmessage()], 500);


    }
    }
    

    
}
