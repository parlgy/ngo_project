<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class settings extends Controller
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
    function settings(){
        return view('dist/settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function settingamount(Request $request)
    {
        // {"memberreg":null,"membersub":null,"welfarereg":null,"welfaresub":null}
        // {"member_registration":null,"occurance_member_registration":"1","member_subscription":null,"occuracnce_member_subscription":"2","welfare_registration":null,"occurance_welreg":"2","welfare_subscription":null,"occurance_welfare_subscription":"2"}
        // `ID`, `Account`, `Type`, `Amount`, `Occurance`
        $this->updateaccount(1,$request->member_registration, $request->occurance_member_registration);
        $this->updateaccount(2,$request->member_subscription, $request->occuracnce_member_subscription);
        $this->updateaccount(3,$request->welfare_registration, $request->occurance_welreg);
        $this->updateaccount(4,$request->welfare_subscription, $request->occurance_welfare_subscription);
        

    }
    public function updateaccount($id,$amount, $occarance)
    {
       Account::where('ID',$id)
                ->update(['Amount'=>$amount, 'Occurance'=>$occarance]); 
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
