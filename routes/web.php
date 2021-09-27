<?php

use Illuminate\Support\Facades\Route;

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

//Pages
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('index');
Route::get('/become-freelancer', [App\Http\Controllers\Front\HomeController::class, 'freelancerForm'])->name('become.freelancer')->middleware('auth');
Route::post('/become-freelancer', [App\Http\Controllers\Front\HomeController::class, 'freelancerFormPost'])->name('become.freelancerFormPost')->middleware('auth');
Route::get('/search', [App\Http\Controllers\Front\HomeController::class, 'search'])->name('search');
Route::get('/category/{slug}', [App\Http\Controllers\Front\HomeController::class, 'category'])->name('category');
Route::get('/tags/{tag}', [App\Http\Controllers\Front\HomeController::class, 'tags'])->name('tags');

Route::get('/aboutus', [App\Http\Controllers\Front\HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/privacy-and-policy', [App\Http\Controllers\Front\HomeController::class, 'privacyandpolicy'])->name('privacyandpolicy');
Route::get('/usage-rules', [App\Http\Controllers\Front\HomeController::class, 'usagerules'])->name('usagerules');

//Auth
Auth::routes();
Route::post('/password/email', [App\Http\Controllers\Auth\ResetPasswordController::class, 'tokenRequest'])->name('password.email')->middleware('guest');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->middleware('guest');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update')->middleware('guest');

//Jobs
Route::get('/advertisements', [App\Http\Controllers\Front\AdvertController::class, 'index'])->name('advert.index');
Route::get('/advertisements/{slug}', [App\Http\Controllers\Front\AdvertController::class, 'show'])->name('advert.show');

//Chat
Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function ($router) {
    Route::get('/', [App\Http\Controllers\Front\ChatController::class, 'chats'])->name('message.index');
    Route::get('/{user}/check', [App\Http\Controllers\Front\ChatController::class, 'check'])->name('chat.check');
    Route::get('/{chat}/{limit}/load', [App\Http\Controllers\Front\ChatController::class, 'loadMessage']); 
    Route::post('/{chat}/send', [App\Http\Controllers\Front\ChatController::class, 'sendMessage'])->name('message.sendMessages')->middleware('throttle:30,1');
});

//Account
Route::get('/profile/{user}', [App\Http\Controllers\Front\UserController::class, 'show'])->name('user.show');
Route::get('/account', [App\Http\Controllers\Front\UserController::class, 'account'])->name('user.account')->middleware('auth');
Route::post('/account/save', [App\Http\Controllers\Front\UserController::class, 'save'])->name('user.account.save')->middleware('auth');
Route::post('/account/pass', [App\Http\Controllers\Front\UserController::class, 'pass'])->name('user.account.pass')->middleware('auth');
Route::get('/orders', [App\Http\Controllers\Front\OrderController::class, 'index'])->name('order')->middleware('auth');
Route::post('/orders/{advert}/store', [App\Http\Controllers\Front\OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::post('/orders/comment', [App\Http\Controllers\Front\OrderController::class, 'comment'])->name('order.comment')->middleware('auth');
Route::get('/account/adverts', [App\Http\Controllers\Front\UserController::class, 'adverts'])->name('account.adverts')->middleware('auth');
Route::get('/account/adverts/create', [App\Http\Controllers\Front\UserController::class, 'advertCreate'])->name('account.adverts.create')->middleware('auth');
Route::post('/account/adverts/create', [App\Http\Controllers\Front\UserController::class, 'advertStore'])->name('account.adverts.store')->middleware('auth');
Route::get('/account/adverts/{advert}', [App\Http\Controllers\Front\UserController::class, 'advertEdit'])->name('account.adverts.edit')->middleware('auth');
Route::post('/account/adverts/{advert}', [App\Http\Controllers\Front\UserController::class, 'advertUpdate'])->name('account.adverts.update')->middleware('auth');






