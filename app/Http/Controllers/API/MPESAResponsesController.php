<?php

namespace App\Http\Controllers\API;
use App\Models\stkcallback;
use App\Models\membersaccount;
use App\Models\member_ledger;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MPESAResponsesController extends Controller
{


    public function validation(Request $request){
        // return $request;
        Log::info('Validation endpoint hit');
        Log::info($request->all());

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }

    public function stkPush(Request $request){
       $lnmo = $request['Body']['stkCallback'];
       $lnmo = json_encode($lnmo);
       $lnmo = json_decode($lnmo, TRUE);
       if(count($lnmo)>4){
        $lnmoResult = $request['Body']['stkCallback']['CallbackMetadata']['Item'];
        $lnmoResult = json_encode($lnmoResult);
        $lnmoResult = json_decode($lnmoResult, TRUE);
        
        foreach ($lnmoResult as $nonre => $param) {
            foreach ($param as $key => $value) {
                if($value !== 'Balance'){
                    $requiredDat[] = $value;
                }
            }
        }
        if(count($requiredDat)>1){
            $postkey1 =$requiredDat[0]; $value1 =$requiredDat[1];
            $postkey2 = $requiredDat[2]; $value2 =$requiredDat[3];
            $postkey3 = $requiredDat[4]; $value3 =$requiredDat[5];
            $postkey4 = $requiredDat[6]; $value4 =$requiredDat[7];
            $post = new stkcallback;
            $post->MerchantRequestID    =$request['Body']['stkCallback']['MerchantRequestID'];
            $post->ResultCode           =$request['Body']['stkCallback']['ResultCode']; 
            $post->postkey1             =$value1;
            $post->postkey2             =$value2;
            $post->postkey3             =$value3;
            $post->postkey4             =$value4;
            $post->save;

            $amount                 = $request['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
            $mpesaReceiptNumber     = $request['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            $balance                = $request['Body']['stkCallback']['CallbackMetadata']['Item'][2]['Name'];
            $transactionDate        = $request['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
            $phone                  = $request['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
            $TransToken             ==$request['Body']['stkCallback']['MerchantRequestID'];
            $requestresult = DB::select("SELECT `ID_Number`, `RegNo`, `MerchantRequestID`, `CheckoutRequestID`, `response_code`, `response_description`, `customer_message` FROM `mpesa_st_expressresults`");
            $this->insertledger($requestresult[0]->ID_Number,$mpesaReceiptNumber,$TransToken,$amount,'MPESA PAYMENT',$transactionDate,$requestresult[0]->ID_Number,$requestresult[0]->id,0,0,$amount);
        }   
    }
}

public function reconcileaccount()
{

    $expecteds = DB::select("SELECT SUM(Amount) AS Amount from accounts");
    $AccountBallance = DB::select("SELECT AccountBallance FROM member_account WHERE ID = (SELECT MAX(ID) FROM member_account WHERE ID_Number = '32683489')");
    $Amountpaid = 1000;
    $expected =0;
    $ballance =0;
    if (!empty($expecteds)) {$expected = $expecteds[0]->Amount;}
    if (!empty($AccountBallance)) {$ballance = $AccountBallance[0]->AccountBallance;}   
    $count = DB::select("SELECT count(ID) as count from accounts");
    $Amountpaid = $Amountpaid + $ballance;

    for ($i=1; $i <= $count[0]->count ; $i++) { 
        $Account = DB::select("SELECT * from accounts where ID ="."'".$i."'");
        $countamount = DB::select("SELECT SUM(TransAmount) as Amount from member_account where ACCID ="."'".$i."' AND ID_Number = '32683489'");
        $Accountamount = $Account[0]->Amount;
        $Paidaccountamount = $countamount[0]->Amount;
        if ($Amountpaid > 0) {
            if ($Paidaccountamount > 0) {
                if ($Amountpaid == $Paidaccountamount) {
                    continue;
                }elseif ($Amountpaid > $Paidaccountamount) {
                    if ($Amountpaid > $Accountamount) {
                        $this->insertTransaction('32683489','TEST','TEST',$Accountamount,'Amount greater the Amount defined',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);
// $Accountamount
                        $Amountpaid = $Amountpaid - $Accountamount;
                        $expected = $expected-$Accountamount;
                        continue;
                    }elseif ($Amountpaid < $Accountamount && $Accountamount > 0) {
                        $this->insertTransaction('32683489','TEST','TEST',$Amountpaid,'Amount less than defined amount',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);

                        $Amountpaid = $Amountpaid - $Accountamount;
                        $expected = $expected-$Accountamount;
                        break;
                    }elseif ($Amountpaid == $Accountamount) {
                        $this->insertTransaction('32683489','TEST','TEST',$Amountpaid,'Amount equal defined',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);

                        $Amountpaid = $Amountpaid - $Accountamount;
                        $expected = $expected-$Accountamount;
                        break;
                    }
                }

            }elseif ($Amountpaid == $Accountamount) {
                $this->insertTransaction('32683489','TEST','TEST',$Accountamount,'no previous payment payment equl to defined',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);

                $Amountpaid = $Amountpaid - $Accountamount;
                $expected = $expected-$Accountamount;
                break;
            }elseif ($Amountpaid > $Accountamount) {
                $this->insertTransaction('32683489','TEST','TEST',$Accountamount,'no previous payment payment greater than defined',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);

                $Amountpaid = $Amountpaid - $Accountamount;
                $expected = $expected-$Accountamount;
                continue;
            }elseif ($Amountpaid >0 && $Accountamount ==0) {
                $this->insertTransaction('32683489','TEST','TEST',$Amountpaid,'no previous payment payment less than defined',now(),$Account[0]->Account,$Account[0]->ID,$Amountpaid,$expected,'PAID',);

                $Amountpaid = $Amountpaid - $Accountamount;
                $expected = $expected-$Accountamount;
                break;
            }


        }          
    }


}
public function insertTransaction($id,$TransID,$token,$TransAmount,$description,$TransTime,$Account,$acid,$AccountBallance,$Eexpected,$paid){
    $post = new membersaccount;
    $post->TransID              =$TransID;
    $post->ID_Number            =$id;
    $post->ACCID                =$acid;
    $post->TransAmount          =$TransAmount;
    $post->TransTime            =$TransTime;
    $post->Account              =$Account;
    $post->AccountBallance      =$AccountBallance;
    $post->Eexpected            =$Eexpected;
    $post->Paid                 =$paid;
    $post->TransToken           =$token;
    $post->description          =$description;                  
    $post->save();
}
public function insertledger($id,$TransID,$token,$TransAmount,$description,$TransTime,$Account,$acid,$AccountBallance,$credit,$Debit){
    
    $post = new member_ledger;
    $post->TransID              =$TransID;
    $post->ID_Number            =$id;
    $post->TransAmount          =$TransAmount;
    $post->TransTime            =$TransTime;
    $post->Account              =$Account;
    $post->AccountBallance      =$AccountBallance;
    $post->credit               =$credit;
    $post->Debit                =$Debit;
    $post->TransToken           =$token;
    $post->Description          =$description;                  
    $post->save();
}
public function b2cCallback(Request $request){

    Log::info('B2C endpoint hit');
    Log::info($request->all());
    return [
        'ResultCode' => 0,
        'ResultDesc' => 'Accept Service',
        'ThirdPartyTransID' => rand(3000, 10000)
    ];
}

public function transactionStatusResponse(Request $request){
    Log::info('transactionStatusResponse  endpoint hit');
    Log::info($request->all());
    return [
        'ResultCode' => 0,
        'ResultDesc' => 'Accept Service',
        'ThirdPartyTransID' => rand(3000, 10000)
    ];
}

public function transactionReversal(Request $request){
    Log::info('transactionReversal  endpoint hit');
    Log::info($request->all());
    return [
        'ResultCode' => 0,
        'ResultDesc' => 'Accept Service',
        'ThirdPartyTransID' => rand(3000, 10000)
    ];
}


public function confirmation(Request $request){

    Log::info('Confirmation endpoint hit');
    Log::info($request->all());

    return [
        'ResultCode' => 0,
        'ResultDesc' => 'Accept Service',
        'ThirdPartyTransID' => rand(3000, 10000)
    ];
}
}
