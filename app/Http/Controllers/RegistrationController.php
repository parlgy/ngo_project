<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Session;
use DB;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

     function getWard($subcounty){
        
        $ward = DB::table('ward')->where('ID',$subcounty)->get();
        $output = '<option value="None">Select Ward</option>';
        foreach ($ward as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->Ward.'</option>';
        }
        echo $output;
    }
     function getSubcounty($county){
        
        $subcounty = DB::table('sub_county')->where('id_county',$county)->get();
        $output = '<option value="None">Select Sub County</option>';
        foreach ($subcounty as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->sub_county.'</option>';
        }
        echo $output;
    }
     function getCounty(){
        
        $county = DB::table('county')->get();
        $output = '<option value="None">Select County</option>';
        foreach ($county as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->County.'</option>';
        }
        echo $output;
    }
     function getLocation($ward){
        
        $Location = DB::table('locations')->where('ward',$ward)->get();
        $output = '<option value="None">Select Location</option>';
        foreach ($Location as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->Location.'</option>';
        }
        echo $output;
    }
     function getSublocation($location){
        
        $sub_location = DB::table('sub_location')->where('ID',$location)->get();
        $output = '<option value="None">Select Sub Location</option>';
        foreach ($sub_location as $row) {
            $output .= '<option value="'.$row->ID.'">'.$row->sub_location.'</option>';
        }
        echo $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Member;
        $post->FULL_Name =  $request->name;
        $post->ID_Number =  $request->id;
        $post->Title  =  $request->title;
        $post->Gender =  $request->gender;
        $post->Church =  $request->church;
        $post->County =  $request->county;
        $post->sub_county= $request->subcounty;
        $post->ward = $request->ward;
        $post->email =  $request->email;
        $post->save();

        Session::flash('success','Saved Succesfully');
        return redirect('/reg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
