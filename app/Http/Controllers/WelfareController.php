<?php

namespace App\Http\Controllers;

use App\Models\Welfare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use Session;


class WelfareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('linkwelfareregistration')
        ->join('members','members.id', '=','linkwelfareregistration.RegNo')
        ->get();
        $data = json_decode($data, true);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count(); 
        return view('dist/welfareregistered', ['members'=>$data],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    public function nonwelfare()
    {
        $mem = member::pluck('id')->all();
        $reg = welfare::pluck('RegNo')->all();
        $diff = array_diff($mem,$reg);
        // dd($diff);
        $data = member::findMany($diff);
        $data = json_decode($data, true);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count(); 
        return view('dist/welfareregistered', ['members'=>$data],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $id = $request->idnumber;
        $regno = $request->memno;
        $phone = $request->phone;
        $amount = $request->amount;
        DB::beginTransaction();
        try{
              
              $lmnoid= DB::table('lnmo_api_response')->insertGetID([                
                'Amount'=>$amount,
                'PhoneNumber'=>$phone,
                'status'=>'pending'

            ]);
              $idn= DB::table('linkwelfareregistration')->insertGetID([                
                'IDNo'=> $id,
                'RegNo'=>$regno,
                'Phone'=>$phone,
                'PAYID'=>$lmnoid
            ]);
            DB::table('members_account')->insert([
                'RegNo'=> $regno,
                'ID_Number'=>$id,
                'Amount'=> $amount,
                'Phone'=> $phone,
                'PAYID'=>$lmnoid
            ]);
           
            DB::commit();
        }catch(Exception $er){
            echo $er;
            DB::rollBack();
        }
        
        Session::flash('success','Data saved. Please complete accept payment request to DASS (KCPA Paybill)');
        return redirect('/reg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function show($welfare)
    {
        $member = DB::table('members')->where('ID_Number',$welfare)->get();
        echo $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function edit(Welfare $welfare)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welfare $welfare)
    {
        echo $requ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welfare  $welfare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welfare $welfare)
    {
        //
    }
}


