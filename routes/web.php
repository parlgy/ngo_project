<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EditingController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WelfareController;
use App\Http\Controllers\Members;
use App\Http\Controllers\settings;
use App\Http\Controllers\WelfarepaymentController;
use App\Http\Controllers\Payments;
use App\Http\Controllers\DassmembersController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\admindass;
use App\Mail\BacancyMail;
use App\Http\Controllers\registrationupdateController;
use App\Http\Controllers\API\MPESAResponsesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
	return view('welcome');
});
Route::get('/mail', function () {
	return view('registration/button');
});

// Route::get('/dashboard', function () {
// 	return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/clear', function() {
// Artisan::call('make:exception UnsecureException');
Artisan::call('cache:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
return "Cleared!";
});

	Route::group(['middleware'=>['web']],function(){
	Route::get('/b2c', [MPESAResponsesController::class,'reconcileaccount'])->middleware(['web']);
	Route::get('/ward/{subcounty}', [RegistrationController::class,'getWard'])->middleware(['web']);
	Route::get('/county', [RegistrationController::class,'getCounty'])->middleware(['web']);
	Route::get('/subcounty/{county}', [RegistrationController::class,'getSubcounty'])->middleware(['web']);
	Route::get('/loacation/{ward}', [RegistrationController::class,'getLocation'])->middleware(['web']);
	Route::get('/sub_location/{location}', [RegistrationController::class,'getSublocation'])->middleware(['web']);
	Route::get('/reg',[PagesController::class, 'register'])->middleware(['web']);
	Route::get('/monthly', function () {return view('registration/monthly');})->middleware(['web']);
	Route::get('/welfar', function () {	return view('registration/welfare');})->middleware(['web']);
	Route::get('/', function () {return view('web/index');});
	Route::get('/index', function () {return view('web/index');});
	Route::get('/butere', function () {return view('web/butere');});
	Route::get('/central', function () {return view('web/central');});
	Route::get('/contact', function () {return view('web/contact');});
	Route::get('/ikolomani', function () {return view('web/ikolomani');});
	Route::get('/khwisero', function () {return view('web/khwisero');});
	Route::get('/likuyani', function () {return view('web/likuyani');});
	Route::get('/lugari', function () {return view('web/lugari');});
	Route::get('/malava', function () {return view('web/malava');});
	Route::get('/mumiaseast', function () {return view('web/mumiaseast');});
	Route::get('/mumiaswest', function () {return view('web/mumiaswest');});
	Route::get('/navakholo', function () {return view('web/navakholo');});
	Route::get('/shinyalu', function () {return view('web/shinyalu');});
	Route::get('/matete', function () {return view('web/matete');});
	Route::get('/main', function () {return view('web/pages/county');});
	Route::get('/', function(){return view('web/index');})->middleware(['web']);
	Route::post('/registermember', [Members::class,'registermember'])->middleware(['web']);
	Route::get('/searchuser/{id}', [Members::class,'show'])->middleware(['web']);
	Route::get('/membershipform', [Members::class,'index'])->middleware(['web']);
	Route::get('/regm', [Members::class,'register'])->middleware(['web']);
	Route::get('/wel', [Members::class,'welfare'])->middleware(['web']);
	Route::get('/regs', [Members::class,'membersubscription'])->middleware(['web']);
	Route::get('/wels', [Members::class,'welfaresubscription'])->middleware(['web']);
	Route::post('/welfareformsub', [Members::class,'welfareformsub'])->middleware(['web']);
	Route::post('/membersub', [Members::class,'membersub'])->middleware(['web']);
	Route::post('/membersubscription', [RegistrationController::class,'membersubscription'])->middleware(['web']);
	Route::post('/welfareregistration', [Members::class,'welfareregistration'])->middleware(['web']);
	Route::post('/welfaresubscription', [RegistrationController::class,'welfaresubscription'])->middleware(['web']);
	Route::get('dassrediret',function(){return view('registration/dassredirection');})->middleware(['web']);
	Route::get('dassreg',function(){return view('registration/dassregistration');})->middleware(['web']);
	Route::get('dassmembersinvite/{accountnumber}',[DassmembersController::class,'invite'])->name('invitation')->middleware(['web']);
	Route::resource('/dassmembers','App\Http\Controllers\DassmembersController')->middleware(['web']);
	Route::get('applicant2form',function(){return view('registration/applicant2');})->middleware(['web']);
	Route::get('applicant3form',function(){return view('registration/applicant3');})->middleware(['web']);
	Route::get('applicant4form',function(){return view('registration/applicant4');})->middleware(['web']);
	Route::get('sendlink2',function(){return view('registration/sendlink2');})->middleware(['web']);
	Route::get('sendlink3',function(){return view('registration/sendlink3');})->middleware(['web']);
	Route::get('sendlink4',function(){return view('registration/sendlink4');})->middleware(['web']);
	Route::get('sendemail', [MailController::class,'basic_email'])->middleware(['web']);
	Route::post('/sendBacancyMail',[MailController::class,'sendMail'])->name('send.email');
	Route::post('/editmemberregistrationpayment',[registrationupdateController::class,'editmemberregistrationpayment'])->middleware(['auth']);
	Route::post('/editwelfateregistrationpayment',[registrationupdateController::class,'editwelfateregistrationpayment'])->middleware(['auth']);
	Route::get('/searchmember/{id}',[registrationupdateController::class,'searchmember'])->middleware(['auth']);
	Route::get('/searchmemberwelfare/{id}',[registrationupdateController::class,'searchmemberwelfare'])->middleware(['auth']);
	Route::post('updatewelfarepayment',[registrationupdateController::class,'updatewelfarepayment'])->middleware(['auth']);	
	Route::post('/registerwithlink',[DassmembersController::class,'insertapplicants'])->name('editaccount');
	Route::get('/adminregisternewmember',[registrationupdateController::class,'adminregisternewmember']);
	Route::get('/memberaccount/{id}',[registrationupdateController::class,'memberaccount'])->middleware(['auth']);
	Route::resource('/adminregisterupdate','App\Http\Controllers\registrationupdateController')->middleware(['auth']);


	// sendfillbutton
	
	
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
Route::group(['middleware'=>['auth']], function(){
	Route::get('/admin',[PagesController::class, 'admin']);
	Route::get('/dashboard',[PagesController::class, 'admin']);
	Route::get('/settings',[settings::class, 'settings']);
	Route::post('/settingamount',[settings::class, 'settingamount']);
	Route::get('/adminwelfare',[PagesController::class, 'welfare']);
	Route::get('/payment',[PagesController::class, 'payment']);
	Route::get('/monthlyshares',[PagesController::class, 'monthlyshares']);
	Route::get('/memberssubscription',[PagesController::class, 'membersubcription']);
	Route::get('/adminunmerged',[PagesController::class, 'unmerged']);
	Route::get('/unreceipted',[payments::class, 'unreceipted']);
	Route::post('/merge',[payments::class, 'merge']);
	Route::post('editpayment',[Payments::class,'editpayment']);
	Route::get('/allpay',[PagesController::class, 'allpay']);
	Route::get('/failed',[PagesController::class, 'failed']);
	Route::post('editwelfare/{id}',[EditingController::class,'updatewelfare']);
	Route::post('editmember/{id}',[EditingController::class,'updatemember']);
	Route::post('editunmerged/{id}',[EditingController::class,'updateunmerged']);
	Route::get('/welfaremembers',[PagesController::class, 'allwelfare']);
	Route::post('editpayments',[EditingController::class, 'editpayments']);
	Route::get('amember',[Members::class,'amember']);
	Route::post('editmember',[Members::class,'editmember']);
	Route::post('/editwelfarepayment',[WelfarepaymentController::class,'editpay']);
	Route::post('eamember',[Members::class,'eamember']);
	Route::post('storewelfare',[WelfareController::class,'storewelfare']);
	Route::post('stkresponse',[WelfareController::class,'stkresponse']);
	Route::get('/accountdass',[admindass::class, 'members']);


	Route::get('/search/{id}',[PagesController::class,'getmember']);
	Route::get('registrationpayments',[PagesController::class,'memregistration']);
	Route::get('/nonwelfare',[WelfareController::class,'nonwelfare']);
	Route::resource('/welfares','App\Http\Controllers\WelfareController');
	Route::resource('/member','App\Http\Controllers\Members');
	Route::resource('/admindass','App\Http\Controllers\admindass');
});
Route::group(['middleware'=>['guest']], function(){
    Route::get('/welfare',[PagesController::class, 'welfare']);
    Route::get('/payments',[PagesController::class, 'payment']);
    Route::get('/unmerged',[PagesController::class, 'unmerged']);
    Route::get('/allmembers',[PagesController::class, 'allpay']);
    Route::get('/welfaremembers',[PagesController::class, 'allwelfare']);
    });
// 
