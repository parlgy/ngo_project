<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mpesa;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class Mpesapayment extends Controller
{
    public function registerurls(){
        $simulateResponse=Mpesa::simulateC2B(100, "254718258849", "Testing");
        return $simulateResponse;
    }
    public function simulate(){
        $simulateResponse=Mpesa::simulateC2B(100, "254718258849", "Testing");
        return $simulateResponse;
    }
    
    public function lmnocallback(Request $request){
        return $request;
        $paymentMethod          = $request->paymentMethod;
        $amount                 = $request->amount;
        $providerCode           = $request->provider;
        $customerName           = $request->customerName;
        $customerEmail          = $request->customerEmail;
        $paymentDescription     = $request->paymentDescription;
        $paymentStatus          = $request->paaymentStatus;
        $transactionReference   = $request->transactionReference;
    }
}
