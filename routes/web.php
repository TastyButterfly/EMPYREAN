<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;

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

//STATIC PAGES
Route::get('/crysis_info', function(){
    return view('crysis_info');
});
Route::get('/fortnite_info', function(){
    return view('fortnite_info');
});
Route::get('/gamelibrary', function(){
    return view('gamelibrary');
});
Route::get('/genshinImpact_info', function(){
    return view('genshinImpact_info');
});
Route::get('minecraft_info', function(){
    return view('minecraft_info');
});
Route::get('/valorant_info', function(){
    return view('valorant_info');
});
Route::get('/legal', function(){
    return view('legal');
});
Route::get('/srandroid', function(){
    return view('srandroid');
});
Route::get('/srequirement', function(){
    return view('srequirement');
});
Route::get('/srbrowser', function(){
    return view('srbrowser');
});
Route::get('/srwindowpc', function(){
    return view('srwindowpc');
});
Route::get('/srchromeOS', function(){
    return view('srchromeOS');
});
Route::get('/srsmartTV', function(){
    return view('srsmartTV');
});
Route::get('/support', function(){
    return view('support');
});
Route::get('/instructions', function(){
    return view('instructions');
});
Route::get('/aboutUs', function () {
    return view('aboutUs');
});
Route::get('/acknowledgements', function () {
    return view('acknowledgements');
});
Route::get('/assassinCreed_info', function(){
    return view('assassinCreed_info');
});
//HOME PAGE
Route::get('/', function () {
    return view('homepage');
})->name('home');
//OPEN PAGES
Route::get('/sign_up', function () {
    return view('sign_up');
});
Route::get('/buyingPass', function(){
    return view('buyingPass');
});
Route::get('/subscribe', function(){
    return view('subscribe');
})->name('subscribe');

//SERVER-USED ROUTES   
Route::post('/register', [UserController::class, 'register'])->name('users.register');
Route::post('/admin/validate', [AdminController::class, 'validateAdmin'])->name('admins.validateAdmin');
Route::post('/validate-user', [UserController::class, 'validateUser'])->name('users.validateUser');
Route::get('/cancelPayment', [PaymentController::class, 'cancelPayment'])->name('payments.cancelPayment');
Route::post('/submitSubscription', [SubscriptionController::class, 'submit'])->name('subscriptions.submit');
Route::post('/pay', [PaymentController::class, 'pay'])->name('payments.pay');
Route::post('/zeroPay', [SubscriptionController::class, 'zeroPayment'])->name('subscriptions.zeroPayment');
Route::get('/receipt', [PaymentController::class, 'showReceipt'])->name('receipt');

//CANCEL BUTTON ROUTES
Route::get('/user/cancel', [UserController::class, 'cancel'])->name('users.cancel');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');
Route::get('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
Route::get('/receipt', [PaymentController::class, 'showReceipt'])->name('receipt');
Route::get('/viewReceipt/{subscription}', [SubscriptionController::class, 'viewReceipt'])->name('viewReceipt');

//ONLY ADMINS CAN ACCESS
Route::middleware(['admin'])->group(function () {
    Route::resource('users',UserController::class);
    Route::resource('subscriptions',SubscriptionController::class);
    Route::resource('payments',PaymentController::class);
    Route::resource('sessions',SessionController::class);
    Route::get('/admin', function(){return view('adminDashboard');})->name('admin');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admins.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admins.profile');
});

//ONLY USERS CAN ACCESS
Route::middleware(['user'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
    Route::get('/editUsername', [UserController::class, 'redirectToEditUsername'])->name('users.editUsername');
    Route::get('/editPassword', [UserController::class, 'redirectToEditPassword'])->name('users.editPassword');
    Route::get('/deactivateAccount', [UserController::class, 'redirectToDeactivate'])->name('users.deactivateAccount');
});

//ONLY SYSTEM CAN ACCESS
Route::middleware(['verifyInternalRequest'])->group(function () {
    Route::post('/users/{user}/deactivate/{token}', [UserController::class, 'deactivate'])->name('users.deactivate');
    Route::put('/users/{user}/update-password/{token}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::put('/users/{user}/update-username/{token}', [UserController::class, 'updateUsername'])->name('users.updateUsername');
});

//ONLY NON-USERS CAN ACCESS TO PREVENT DUPLICATE ACCOUNTS
Route::middleware(['adminLogin'])->group(function () {
    Route::get('/admin_sign_in', function () {
        return view('admin_sign_in');
    })->name('admin_sign_in');
});
//ONLY NON-ADMINS CAN ACCESS TO PREVENT DUPLICATE ACCOUNTS
Route::middleware(['userLogin'])->group(function () {
    Route::get('/sign_in', function () {
        return view('sign_in');
    })->name('sign_in');
});