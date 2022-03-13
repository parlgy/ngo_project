<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Member;
use App\Models\memberSubscription;
use App\Models\welfareSubscription;
use App\Models\welfareRegistration;
use App\Models\stkpush;
use Mpesa;
class Members extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expected = DB::select("SELECT * from accounts");
        return view('registration/index');
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
    public function register()
    {
        $expected = DB::select("SELECT * from accounts where ID = '1'");
        return view('registration/memberregistration')->with(['Amount'=>$expected[0]->Amount]);
    }
    public function welfare(){
        $expected = DB::select("SELECT * from accounts where ID = '1'");
        return view('registration/welfare')->with(['Amount'=>$expected[0]->Amount]);
    }
    public function membersubscription(){
        $expected = DB::select("SELECT * from accounts where ID = '1'");
        return view('registration/membersubscription')->with(['Amount'=>$expected[0]->Amount]);
    }
    public function welfaresubscription(){
        $expected = DB::select("SELECT * from accounts where ID = '1'");
        return view('registration/welfaresubscription')->with(['Amount'=>$expected[0]->Amount]);
    }
    public function mpesa($amount,$phone,$id){
        $phone   = str_starts_with($phone, '+') ? ltrim($phone, '+') : $phone;
        $phone   = substr($phone, 0, 1) == '0' ? preg_replace('/^0/', '254', $phone) : $phone ;
        $phone   = substr($phone, 0, 1) == '7' ? '254'.$phone : $phone ;
        $phone = strlen($phone) ==12 ? $phone : 'Phone Length is invalid';
        $phone = is_numeric($phone) ? $phone :  'Phone must be numbers';
        $expressResponse=Mpesa::express((int) $amount,$phone,$id,'NGO PAYMENT');
       $ex = json_decode($expressResponse, true);

       if(array_key_exists('errorCode', $ex)) {
            return  $ex['errorMessage'];            
        }
        else {
            $post = new stkpush;
       $post->ID_Number             =       $request->id;
       $post->MerchantRequestID     =       $ex['MerchantRequestID'];
       $post->response_code         =       $ex['ResponseCode'];
       $post->customer_message      =       $ex['ResponseDescription'];
       $post->save();
       return  'Your details have been saved. approve payment with your pin to complte registration';
        }
    }
    public function membersub(Request $request){
        $phone = $request->phone;
        $amount =(int) $request->amount;
        $phone   = str_starts_with($phone, '+') ? ltrim($phone, '+') : $phone;
        $phone   = substr($phone, 0, 1) == '0' ? preg_replace('/^0/', '254', $phone) : $phone ;
        $phone   = substr($phone, 0, 1) == '7' ? '254'.$phone : $phone ;
        $phone = strlen($phone) ==12 ? $phone : 'Phone Length is invalid';
        $phone = is_numeric($phone) ? $phone :  'Phone must be numbers';
        $expressResponse=Mpesa::express((int) $amount,$phone,$request->idnumber,'NGO PAYMENT');
       $ex = json_decode($expressResponse, true);

       if(array_key_exists('errorCode', $ex)) {
            return  $ex['errorMessage'];            
        }
        else {
            $post = new stkpush;
       $post->ID_Number             =       $request->RegNo;
       $post->MerchantRequestID     =       $ex['MerchantRequestID'];
       $post->response_code         =       $ex['ResponseCode'];
       $post->customer_message      =       $ex['ResponseDescription'];
       $post->save();
       
        }
        if (memberSubscription::where('ID_Number', '=', $request->id)->exists()) 
            {
                return mpesa($amount,$phone,$request->idnumber);
            }
            $post = new memberSubscription;
            $post->ID_Number    =   $request->RegNo;
            $post->Name         =   $request->fullname;
            $post->transToken   =   $ex['MerchantRequestID'];
            $post->Amount       =   $request->amount;
            $post->phone        =   $request->phone;
            $post->save();
            return  'Your details have been saved. approve payment with your pin to complte registration';
        
    }
    public function welfareformsub(Request $request){
        
        $phone = $request->phone;
        $amount =(int) $request->amount;
        $phone   = str_starts_with($phone, '+') ? ltrim($phone, '+') : $phone;
        $phone   = substr($phone, 0, 1) == '0' ? preg_replace('/^0/', '254', $phone) : $phone ;
        $phone   = substr($phone, 0, 1) == '7' ? '254'.$phone : $phone ;
        $phone = strlen($phone) ==12 ? $phone : 'Phone Length is invalid';
        $phone = is_numeric($phone) ? $phone :  'Phone must be numbers';
        $expressResponse=Mpesa::express((int) $amount,$phone,$request->idnumber,'NGO PAYMENT');
       $ex = json_decode($expressResponse, true);

       if(array_key_exists('errorCode', $ex)) {
            return  $ex['errorMessage'];            
        }
        else {
            $post = new stkpush;
       $post->ID_Number             =       $request->RegNo;
       $post->MerchantRequestID     =       $ex['MerchantRequestID'];
       $post->response_code         =       $ex['ResponseCode'];
       $post->customer_message      =       $ex['ResponseDescription'];
       $post->save();
       
        }
        if (welfareSubscription::where('ID_Number', '=', $request->id)->exists()) 
            {
                return mpesa($amount,$phone,$request->idnumber);
            }
            $post = new welfareSubscription;
            $post->ID_Number    =   $request->RegNo;
            $post->Name         =   $request->fullname;
            $post->transToken   =   $ex['MerchantRequestID'];
            $post->Amount       =   $request->amount;
            $post->phone        =   $request->phone;
            $post->save();
            return  'Your details have been saved. approve payment with your pin to complte registration';
    }
    public function welfareregistration(Request $request){
        
        $phone = $request->phone;
        $amount =(int) $request->amount;
        $phone   = str_starts_with($phone, '+') ? ltrim($phone, '+') : $phone;
        $phone   = substr($phone, 0, 1) == '0' ? preg_replace('/^0/', '254', $phone) : $phone ;
        $phone   = substr($phone, 0, 1) == '7' ? '254'.$phone : $phone ;
        $phone = strlen($phone) ==12 ? $phone : 'Phone Length is invalid';
        $phone = is_numeric($phone) ? $phone :  'Phone must be numbers';
        $expressResponse=Mpesa::express((int) $amount,$phone,$request->idnumber,'NGO PAYMENT');
       $ex = json_decode($expressResponse, true);

       if(array_key_exists('errorCode', $ex)) {
            return  $ex['errorMessage'];            
        }
        else {
            $post = new stkpush;
       $post->ID_Number             =       $request->RegNo;
       $post->MerchantRequestID     =       $ex['MerchantRequestID'];
       $post->response_code         =       $ex['ResponseCode'];
       $post->customer_message      =       $ex['ResponseDescription'];
       $post->save();
       
        }
        if (welfareRegistration::where('ID_Number', '=', $request->id)->exists()) 
            {
                return mpesa($amount,$phone,$request->idnumber);
            }
            $post = new welfareRegistration;
            $post->ID_Number    =   $request->RegNo;
            $post->Name         =   $request->fullname;
            $post->transToken   =   $ex['MerchantRequestID'];
            $post->Amount       =   $request->amount;
            $post->phone        =   $request->phone;
            $post->save();
            return  'Your details have been saved. approve payment with your pin to complte registration';
    }
    public function editmember(Request $request){
        $member = Member::findOrFail($request->MemNo);
        $member->FULL_Name =$request->full_name;
        $member->Title = $request->title;
        $member->Church = $request->church;
        $member->sub_county =$request->subcounty;
        $member->ward = $request->ward;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->save();

        Session::flash('success','Changes saved');
        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    public function registermember(Request $request){
        if (Member::where('Id_nmber', '=', $request->id)->exists()) {return 'ID Number '.$request->id.' Already Registerd. Please complate payment if you did not aprove last time.';}

       $post = new Member;
       $post->First_name =  $request->First_name;
       $post->Middle_name =  $request->Middle_card;
       $post->Last_Name =  $request->Last_name;
       $post->Id_nmber =  $request->id;
       $post->Phone  =  $request->phone;
       $post->Gender =  $request->gender;
       $post->Church =  $request->church;
       $post->County =  $request->county;
       $post->Sub_county= $request->subcounty;
       $post->Ward = $request->ward;
       $post->Location = $request->location;
       $post->Sub_location = $request->sublocation;        
       $post->Village =  $request->Village;
       $post->DOB =  $request->dob;
       $post->Email =  $request->email;
       $post->save();
        $phone = $request->phone;
        $amount = (int)$request->amount;

       $phone   = str_starts_with($phone, '+') ? ltrim($phone, '+') : $phone;
        $phone   = substr($phone, 0, 1) == '0' ? preg_replace('/^0/', '254', $phone) : $phone ;
        $phone   = substr($phone, 0, 1) == '7' ? '254'.$phone : $phone ;
        $phone = strlen($phone) ==12 ? $phone : 'Phone Length is invalid';
        $phone = is_numeric($phone) ? $phone : 'Phone must be numbers';
        


       $expressResponse=Mpesa::express((int) $amount,$phone,$request->id,'Testing Payment');
       $ex = json_decode($expressResponse, true);

       if(array_key_exists('errorCode', $ex)) {
        $post = new stkpush;
       $post->ID_Number             =       $request->id;
       $post->MerchantRequestID     =       $ex['requestId'];
       $post->response_code         =       $ex['errorCode'];
       $post->customer_message      =       $ex['errorMessage'];
       $post->save();
            return  $ex['errorMessage'];
            
        }
        else {
            $post = new stkpush;
       $post->ID_Number             =       $request->id;
       $post->MerchantRequestID     =       $ex['MerchantRequestID'];
       $post->response_code         =       $ex['ResponseCode'];
       $post->customer_message      =       $ex['ResponseDescription'];
       $post->save();
       return  'Your details have been saved. approve payment with your pin to complte registration';
        }
       

       Session::flash('success','Saved Succesfully');
       return redirect('/');

   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::get()->where('Id_nmber', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function amember(){
        $members = DB::table('members')
        ->join('County','County.ID', '=','members.County')
        ->join('sub_county','sub_county.ID', '=','members.sub_county')
        ->join('Ward','Ward.ID', '=','members.Ward')
        ->get();
        $members = json_decode($members,true);
        return view('dist/members', ['members'=>$members]);
    }
    public function eamember(Request $request){
    return view('dist/members');
}
}
