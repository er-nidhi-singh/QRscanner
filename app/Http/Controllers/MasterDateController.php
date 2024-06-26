<?php

namespace App\Http\Controllers;

use App\Models\MasterDate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportMaster;
use Illuminate\Support\Facades\Validator;


class MasterDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = MasterDate::orderBy("id", "DESC")->get();
        return view('pages.masterlist',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addmaster');

    }
    public function bulk_master()
    {
        return view('pages.bulk_master');
    }

    public function master_import(Request $request)
    {
        Excel::import(new ImportMaster, $request->file('excel'));
        return redirect('master-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterDate  $masterDate
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDate $masterDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterDate  $masterDate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = MasterDate::where('id',$id)->first();
        return view('pages.masterlist',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterDate  $masterDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterDate  $masterDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
