<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\PagesModel;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    function admin(){
        
        return view('dist/main');
    }
    
    function payment(){
        $datas = DB::table('members_account')->join('members','RegNo','=','members.id')->join('lnmo_api_response','PAYID','=','lnmo_api_response.id')->get();
    
        $datas = json_decode($datas,true);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/payments', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    function welfare(){
        $datas = DB::select("SELECT members.id, FULL_Name, Title,Church,sub_county,ward,phone FROM `members`, welfare_members WHERE members.id= welfare_members.Reg_No");
        $datas = array_map(function($datas){return (array)$datas;},$datas);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/payments', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    function unmerged(){
        $datas = DB::select("SELECT members_account.RegNo,Title, FULL_Name,TransactionDate, Church, sub_county, ward,PhoneNumber, MpesaReceiptNumber, lnmo_api_response.Amount FROM members_account LEFT JOIN members ON members.id = members_account.RegNo RIGHT JOIN lnmo_api_response ON members_account.TRANSACTION_No = lnmo_api_response.MpesaReceiptNumber and members.id=''");
        $datas = array_map(function($datas){return (array)$datas;},$datas);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/unmerged', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    function allpay(){
        $datas = PagesModel::all();
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/unmerged', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    function allwelfare(){
        $datas = DB::select('SELECT members.`RegNo`, `FULL_Name`, `ID_Number`, `Title`, `Gender`, `Church`, `sub_county`, `ward`, `phone` FROM `members`, welfare_members WHERE members.RegNo = welfare_members.Reg_No');
        $datas = array_map(function($datas){return (array)$datas;},$datas);
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count();      
        return view('dist/payments', ['members'=>$datas],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
    function register(){
        return view('registration/register');
    }

    function getWard($subcounty){
        $ward = DB::table('wards')->where('sub_county',$subcounty)->get();
        $output = '';
        foreach ($ward as $row) {
            $output .= '<option value="'.$row->Ward_name.'">'.$row->Ward_name.'</option>';
        }
        echo $output;
    }
    public function getmember($id)
    {   

        $member = DB::table('members')->where('ID_Number',$id)->get();
        echo $member;

    }
    public function memregistration(){
        $data2 = Member::count();
        $trans = DB::table('lnmo_api_response')->count();  
        $pay = DB::table('members_account')->count();
        $welf =DB::table('linkwelfareregistration')->count();
        $number = DB::table('members_account')->where('TRANSACTION_No',[''])->count(); 
        $registration = DB::table('linkmemberregistration')
        ->join('members','members.id', '=','linkmemberregistration.RegNo')
        ->get();
        $registration = json_decode($registration,true);
        return view('dist/registration', ['members'=>$registration],['counts'=>$data2])->with('pays',$pay)->with('trans',$trans)->with('unmerged',$number)->with('welf',$welf);
    }
}
