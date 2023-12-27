<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DebitCardController;
use App\Http\Controllers\InternalTransferController;
use App\Http\Controllers\NewAccountController;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('demo', [AccountController::class, 'demo']);
Route::post('demo', [AccountController::class, 'storeDemo'])->name('storeDemo');

Route::view('/', 'pages.index')->name('index');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/loan', 'pages.loan')->name('loan');
Route::view('/investment', 'pages.investment')->name('investment');
Route::view('/portfoliomgt', 'pages.portfoliomgt')->name('portfoliomgt');
Route::view('/forex', 'pages.forex')->name('forex');
Route::view('/personal/checking', 'pages.personal.checking')->name('personal.checking');
Route::view('/personal/savings', 'pages.personal.savings')->name('personal.savings');
Route::view('/personal/ira', 'pages.personal.ira')->name('personal.ira');
Route::view('/business/checking', 'pages.business.checking')->name('business.checking');
Route::view('/business/savings', 'pages.business.savings')->name('business.savings');
Route::view('/business/ira', 'pages.business.ira')->name('business.ira');
Route::view('/wealthmgt/trust-service', 'pages.wealth.trust-service')->name('trust-service');
Route::view('/wealthmgt/estate-planning', 'pages.wealth.estate-planning')->name('estate-planning');
Route::view('/wealthmgt/financial-planning', 'pages.wealth.financial-planning')->name('financial-planning');


Route::get('signup/personal-info', [NewAccountController::class, 'personalInfo'])->name('personalInfo');
Route::post('signup/personal-info', [NewAccountController::class, 'storeAccountInfo'])->name('storeAccountInfo');
Route::get('account/setup/xd{id}3et64', [NewAccountController::class, 'accountSetup'])->name('accountSetup');
Route::post('account/setup/', [NewAccountController::class, 'storeAccountSetup'])->name('storeAccountSetup');
Route::get('account/terms-and-conditions/xd{id}3et64', [NewAccountController::class, 'terms'])->name('terms');
Route::get('account/review/xd{id}3et64', [NewAccountController::class, 'accountReview'])->name('accountReview');
Route::get('submit/details/xd{id}3et64', [NewAccountController::class, 'submitDetails'])->name('submitDetails');

// Route for OTP verification
Route::get('/otp-verification', [OTPVerificationController::class, 'show'])->name('otp-verification');
Route::post('/otp-verification', [OTPVerificationController::class, 'verify'])->name('otp-verify');
Route::get('/resend-otp', [OTPVerificationController::class, 'sendOTP'])->name('send-otp');

Route::get('testing/{id}', [UserController::class, 'testing'])->name('testing');
Route::get('pending/{id}', [UserController::class, 'acctPending'])->name('acctPending');


Route::group(['middleware' => ['auth', 'active'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('support', [UserController::class, 'support'])->name('support');
    Route::get('showHistory', [UserController::class, 'showHistory'])->name('showHistory');

    Route::get('transfer', [TransferController::class, 'transfer'])->name('transfer');
    Route::get('transfer/history', [TransferController::class, 'transferHistory'])->name('transferHistory');
    Route::post('storeTransfer', [TransferController::class, 'storeTransfer'])->name('storeTransfer');
    Route::get('first/transfer/code/{id}', [TransferController::class, 'firstCode'])->name('firstCode');
    Route::post('first/transfer/code', [TransferController::class, 'storeFirstCode'])->name('storeFirstCode');
    Route::get('second/transfer/code/{id}', [TransferController::class, 'secondCode'])->name('secondCode');
    Route::post('second/transfer/code/', [TransferController::class, 'storeSecondCode'])->name('storeSecondCode');
    Route::get('third/transfer/code/{id}', [TransferController::class, 'thirdCode'])->name('thirdCode');
    Route::post('third/transfer/code/', [TransferController::class, 'storeThirdCode'])->name('storeThirdCode');
    Route::get('transfer/success/{id}', [TransferController::class, 'transferSuccess'])->name('transferSuccess');

    // Card Route
    Route::resource('card', DebitCardController::class);

    //  Password Route
    Route::get('security', [UserController::class, 'password'])->name('password');
    Route::get('storePassword', [UserController::class, 'storePassword'])->name('storePassword');

    Route::get('messages', [SendMessageController::class, 'messages'])->name('messages');
    Route::get('view/message/{id}', [SendMessageController::class, 'viewMessage'])->name('viewMessage');

    Route::get('transactions', [TransactionController::class, 'transactions'])->name('transactions');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
