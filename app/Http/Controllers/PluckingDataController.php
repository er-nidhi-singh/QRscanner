<?php

namespace App\Http\Controllers;

use App\Models\PluckingData;
use Illuminate\Http\Request;

class PluckingDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = PluckingData::orderBy("id", "DESC")->get();
        return view('pages.plucking_list',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plucking');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PluckingData::create([
            'user_id'=>$request->user_id,
            'plucking_date'=>$request->plucking_date,
            'spraying_date'=>$request->spraying_date,
    ]);
    return redirect('plucking-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PluckingData  $pluckingData
     * @return \Illuminate\Http\Response
     */
    public function show(PluckingData $pluckingData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PluckingData  $pluckingData
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = PluckingData::where('id',$id)->first();
        return view('pages.pluckingedit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PluckingData  $pluckingData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        PluckingData::where('id',$request->id)->update([
            'user_id'=>$request->user_id,
            'plucking_date'=>$request->plucking_date,
            'spraying_date'=>$request->spraying_date,
            'status'=>'Approve',
        ]);
        return redirect('plucking-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PluckingData  $pluckingData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PluckingData::where('id',$id)->delete();
        return redirect('plucking-list');
    }
}
