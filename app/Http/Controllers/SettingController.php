<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = setting::first();
        return view('backend.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function saveSetting(Request $request)
    {
        $countData=setting::count();
    	if($countData==0){
	    	$data=new setting;
	        $data->comment_auto=$request->comment_auto;
	        $data->user_auto=$request->user_auto;
	        $data->recent_limit=$request->recent_limit;
	        $data->popular_limit=$request->popular_limit;
	        $data->recent_comment_limit=$request->recent_comment_limit;
	        $data->save();
	    }else{
	    	$firstData=setting::first();
	    	$data=setting::find($firstData->id);
	        $data->comment_auto=$request->comment_auto;
	        $data->user_auto=$request->user_auto;
	        $data->recent_limit=$request->recent_limit;
	        $data->popular_limit=$request->popular_limit;
	        $data->recent_comment_limit=$request->recent_comment_limit;
	        $data->save();
	    }
        return redirect('/admin/setting')->with('success','Data has been updated.');
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
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting,$id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting,$id)
    {
       //
    }
}
