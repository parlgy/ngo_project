<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiPayments;
use App\Models\membersaccount;
use App\Models\Member;
use App\Models\paymentmodel;
use App\Models\welfareRegistration;
use App\Models\welfareSubscription;
use App\Models\memberRegistration;
use App\Models\memberSubscription;
use Session;
use Illuminate\Support\Facades\DB;

class Payments extends Controller
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
   public function processpayment($request){
        return $request;
   }
    public function unreceipted(){
        $lmno   = ApiPayments::pluck('ID')->all();        
        $pay    = paymentmodel::pluck('PAYID')->all();
        $memberaccount = membersaccount::groupBy('PAYID','RegNo')->selectRaw('sum(Amount) as sum, PAYID,RegNo')->get();
        $memberaccount = str_replace('[', '',$memberaccount);
        $memberaccount = str_replace(']', '',$memberaccount);
        $memberaccount = str_replace('},{', ',',$memberaccount);
        // $memberaccount = json_decode($memberaccount,true);
        $memberregistration = memberRegistration::groupBy('PAYID','RegNo')->selectRaw('sum(Amount) as memberregistration, PAYID,RegNo')->get();
        $memberregistration = str_replace('[', '',$memberregistration);
        $memberregistration = str_replace(']', '',$memberregistration);
        $memberregistration = str_replace('},{', ',',$memberregistration);
        // $memberregistration = json_decode($memberregistration,true);
        $membersubscription = memberSubscription::groupBy('PAYID','RegNo')->selectRaw('sum(Amount) as membersubscription, PAYID,RegNo')->get();
        $membersubscription = str_replace('[', '',$membersubscription);
        $membersubscription = str_replace(']', '',$membersubscription);
        $membersubscription = str_replace('},{', ',',$membersubscription);
        // $membersubscription = json_decode($membersubscription,true);
        $welfareregistration = welfareRegistration::groupBy('PAYID','RegNo')->selectRaw('sum(Amount) as welfareregistration, PAYID,RegNo')->get();
        $welfareregistration = str_replace('[', '',$welfareregistration);
        $welfareregistration = str_replace(']', '',$welfareregistration);
        // $welfareregistration = str_replace('},{', ',',$welfareregistration);
        $welfareregistration = json_decode($welfareregistration,true);
        $welfaresubscription = welfareSubscription::groupBy('PAYID','RegNo')->selectRaw('sum(Amount) as welfaresubcription, PAYID,RegNo')->get()->toJSON();
        $welfaresubscription = str_replace('[', '',$welfaresubscription);
        $welfaresubscription = str_replace(']', '',$welfaresubscription);
        // $welfaresubscription = str_replace('},{', ',',$welfaresubscription);
        // $welfaresubscription = json_decode($welfaresubscription,true);
       // $Merged = json_decode($memberaccount, $welfareregistration,$welfaresubscription,$memberregistration,$membersubscription,true);
               // return $membersubscription;
               // return $Merged;
        foreach ($memberaccount as $account) {
            
        }

    }
    public function unmerged(){
        $lmno = ApiPayments::pluck('ID')->all();
        $macc = membersaccount::pluck('PAYID')->all();
        $diff= array_diff($lmno, $macc);
        $datas = ApiPayments::findMany($diff);
        $datas = json_decode($datas,true);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/unmerged', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }

    public function merge(Request $request){
        $lmno = ApiPayments::pluck('ID')->all();
        $macc = membersaccount::pluck('PAYID')->all();
        $diff= array_diff($lmno, $macc);
        $datas = ApiPayments::findMany($diff);
        $datas = json_decode($datas,true);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count(); 

        $newAccount = new membersaccount;
        $member = DB::table('members')->where('ID_Number','=',$request->account)->get();
        $member = str_replace('[', '',$member);
        $member = str_replace(']', '',$member);
        
        $member = json_decode($member);

        $validate = ApiPayments::find($request->payid);
        // return $validate->MpesaReceiptNumber;
        // return $member;
        if($validate->MpesaReceiptNumber == $request->transactionnumber && $validate->status == 'completed') {        

        $newAccount->PAYID = $request->payid;
        $newAccount->RegNo = $member->id;
        $newAccount->ID_Number = $member->ID_Number;
        $newAccount ->TRANSACTION_No = $request['transactionnumber'];
        $newAccount->Amount=$request['amount'];
        $newAccount->phone=$request['mpesanumber'];

        $newAccount->save();
    }
        Session::flash('success','Payment Merged Success full. Procced to reciept the payment)');

        return view('dist/unmerged', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
        
    }
    public function editpayment(Request $request){

        
            $mreg = new memberRegistration;
            $msub = new memberSubscription;
            $wreg = new welfareRegistration;
            $wsub = new welfareSubscription;

        if($request->memberregistration >0){
            $payments = new paymentmodel;
            $payments->ID_Number = $request->idnumber;
            $payments->TRANSACTION_No = $request->transactionnumber;
            $payments->amount = $request->memberregistration;
            $payments->PAYID = $request->payid;
            $payments->Description = 'Membership Registration';

            $payments->save();
            $mreg->RegNo = $request->memno;
            $mreg->PAYID = $request->payid;
            $mreg->Amount = $request->memberregistration;
            $mreg->Transaction_No = $request->transactionnumber;
            $mreg->save();
        }
        if ($request->membersubcription >0) {
            $payments = new paymentmodel;
            $payments->ID_Number = $request->idnumber;
            $payments->TRANSACTION_No = $request->transactionnumber;
            $payments->amount = $request->membersubcription;
            $payments->PAYID = $request->payid;
            $payments->Description ='Member Subscription';

            $payments->save();
            $msub->RegNo = $request->memno;
            $msub->PAYID = $request->payid;
            $msub->Amount = $request->membersubcription;
            $msub->Transaction_No = $request->transactionnumber;
            $msub->save();
        }
        if ($request->welfaresubcription >0) {
            $payments = new paymentmodel;
            $payments->ID_Number = $request->idnumber;
            $payments->TRANSACTION_No = $request->transactionnumber;
            $payments->amount = $request->welfaresubcription;
            $payments->PAYID = $request->payid;
            $payments->Description ='Welfare Subscription';

            $payments->save();
            $wsub->RegNo = $request->memno;
            $wsub->PAYID = $request->payid;
            $wsub->Amount = $request->welfaresubcription;
            $wsub->Transaction_No = $request->transactionnumber;
            $wsub->save();

        }
        if ($request->welfareregistration >0) {
            $payments = new paymentmodel;
            $payments->ID_Number = $request->idnumber;
            $payments->TRANSACTION_No = $request->transactionnumber;
            $payments->amount = $request->welfareregistration;
            $payments->PAYID = $request->payid;
            $payments->Description = 'Welfare Registration';

            $payments->save();
            $wreg->RegNo = $request->memno;
            $wreg->PAYID = $request->payid;
            $wreg->Amount = $request->welfareregistration;
            $wreg->Transaction_No = $request->transactionnumber;
            $wreg->save();
        }

        

        // title":"Pastor","memno":"48","full_name":"Kipkoech Victor","mpesanumber":null,"transactionnumber":"PCR758QO8L","transdate":"20210401211531","amount":"34","rem":"34","memberregistration":null,"membersubcription":null,"welfareregistration":null,"welfaresubcription":null
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
