<?php

namespace App\Http\Controllers;

use App\Models\Approved_ac;
use Illuminate\Http\Request;

class ApprovedAcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Approved_ac::orderBy("id", "DESC")->get();
        return view('pages.ac_list',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ac_form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Approved_ac::create([
            'name'=>$request->name,
            'description'=>$request->description,
    ]);
    return redirect('approved-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approved_ac  $approved_ac
     * @return \Illuminate\Http\Response
     */
    public function show(Approved_ac $approved_ac)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approved_ac  $approved_ac
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Approved_ac::where('id',$id)->first();
        return view('pages.ac_edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approved_ac  $approved_ac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Approved_ac::where('id',$request->id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect('approved-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approved_ac  $approved_ac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Approved_ac::where('id',$id)->delete();
        return redirect('approved-list');
    }
}
