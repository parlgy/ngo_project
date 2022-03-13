<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Mpesapayment;
use App\Http\Controllers\API\MPESAResponsesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/access/token', [Mpesapayment::class, 'generateAccessToken']);
Route::post('v1/hlab/stk/push', [Mpesapayment::class, 'STKPush']);
Route::get('registerurls',[Mpesapayment::class,'registerurls']);
Route::get('simulate',[Mpesapayment::class,'simulate']);
Route::post('validate',[MPESAResponsesController::class,'validation']);
Route::post('confirm', [MPESAResponsesController::class,'stkPush']);
