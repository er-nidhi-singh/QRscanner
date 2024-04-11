<?php

namespace App\Http\Controllers;

use App\Models\UserRegistration;
use Illuminate\Http\Request;

class UserRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = UserRegistration::orderBy("id", "DESC")->get();
        return view('pages.user_reg',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add_register');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserRegistration::create([
            'username'=>$request->username,
            'vendor_id'=>$request->vendor_id,
            'pincode'=>$request->pincode,
    ]);
    return redirect('register-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(UserRegistration $userRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRegistration  $userRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
