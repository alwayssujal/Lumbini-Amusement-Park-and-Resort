<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\BuyTicketController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketDiscountController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/cs', function () {
    return view('cs');
});

Route::get('/fs', function () {
    return view('fs');
});

Route::get('/kp', function () {
    return view('kp');
});

Route::get('/wp', function () {
    return view('wp');
});

Auth::routes();

//email verification before login or after register
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//handles verfication request sent to email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/buytickets');
})->middleware(['auth', 'signed'])->name('verification.verify');

//resent verfication link to email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/passwords/change', function () {
    return view('auth.passwords.change');
})->middleware('auth', 'verified');

Route::get('/admin/setting', function () {
    return view('admin.setting');
})->middleware('authenticated');

Route::get('/buytickets', [BuyTicketController::class, 'index'])->name('buytickets')->middleware('auth', 'verified');
Route::get('/mytickets', [BuyTicketController::class, 'mytickets'])->name('mytickets')->middleware('auth', 'verified');

Route::get('/admin',[AdminDashboardController::class, 'index'])->name('admin')->middleware('authenticated');
Route::get('/admin/booking',[AdminDashboardController::class, 'booking'])->middleware('authenticated');
Route::get('/admin/customer',[AdminDashboardController::class, 'customer'])->middleware('authenticated');
Route::get('/admin/bookingstatus',[AdminDashboardController::class, 'bookingstatus'])->middleware('authenticated');
Route::get('/admin/accept_payment/{id}',[AdminDashboardController::class, 'accept_payment'])->middleware('authenticated');
Route::get('/admin/cancel_payment/{id}',[AdminDashboardController::class, 'cancel_payment'])->middleware('authenticated');

Route::resource('/ticket', TicketController::class)->middleware('authenticated');
Route::resource('/ticket_discount', TicketDiscountController::class)->middleware('authenticated');
Route::resource('/bookticket', BuyTicketController::class)->middleware('auth', 'verified');

Route::post('/updatebookingstatus',[AdminDashboardController::class, 'updateBookingStatus'])->middleware('authenticated');
Route::get('/openbookingstatus/{id}',[AdminDashboardController::class, 'openBookingStatus'])->middleware('authenticated');

Route::get('/saveticket/{id}',[BuyTicketController::class, 'saveticket']);
Route::get('/cancelticket/{id}',[BuyTicketController::class, 'cancelticket']);

Route::post('/update-password', [UpdatePasswordController::class,'updatepassword']);

Route::get('/esewa/payment_verify', [EsewaController::class, 'verify']);
Route::post('/khalti/payment_verify', [KhaltiController::class, 'verify'])->name('khalti.payment_verify');

Route::get('/khalti/khaltisuccess', function () {
    return redirect()->route('mytickets')->with('success', 'Payment Successfull.');
})->name('khaltisuccess');

Route::get('/khalti/khaltierror', function () {
    return redirect()->route('mytickets')->with('error', 'Something went wrong.');
})->name('khaltierror');




