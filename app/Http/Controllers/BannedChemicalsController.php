<?php

namespace App\Http\Controllers;

use App\Models\BannedChemicals;
use Illuminate\Http\Request;

class BannedChemicalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = BannedChemicals::orderBy("id", "DESC")->get();
        return view('pages.table-banned',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.form-components');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BannedChemicals::create([
            'name'=>$request->name,
            'description'=>$request->description,
    ]);
    return redirect('banned-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BannedChemicals  $bannedChemicals
     * @return \Illuminate\Http\Response
     */
    public function show(BannedChemicals $bannedChemicals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BannedChemicals  $bannedChemicals
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = BannedChemicals::where('id',$id)->first();
        return view('pages.banned_edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BannedChemicals  $bannedChemicals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        BannedChemicals::where('id',$request->id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('banned-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BannedChemicals  $bannedChemicals
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BannedChemicals::where('id',$id)->delete();
        return redirect('banned-list');
    }
}
