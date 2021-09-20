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

//Auth
Auth::routes();

//Jobs
Route::get('/advertisements', [App\Http\Controllers\Front\AdvertController::class, 'index'])->name('advert.index');
Route::get('/advertisements/{slug}', [App\Http\Controllers\Front\AdvertController::class, 'show'])->name('advert.show');

//Messages
Route::get('/messages', [App\Http\Controllers\Front\MessageController::class, 'index'])->name('message.index');
Route::get('/loadChats', [App\Http\Controllers\Front\MessageController::class, 'loadChats'])->name('message.loadChats');
Route::get('/applyChat/{user}', [App\Http\Controllers\Front\MessageController::class, 'applyChat'])->name('message.applyChat');

Route::get('/messages/{chat}', [App\Http\Controllers\Front\MessageController::class, 'show'])->name('message.show');
Route::get('/loadMessages/{chat}/{first_message_id}', [App\Http\Controllers\Front\MessageController::class, 'loadMessages'])->name('message.loadMessages');
Route::get('/lastMessages/{chat}/{last_message_id}', [App\Http\Controllers\Front\MessageController::class, 'lastMessages'])->name('message.lastMessages');
Route::post('/sendMessages/{chat}', [App\Http\Controllers\Front\MessageController::class, 'sendMessages'])->name('message.sendMessages');

//Account
Route::get('/profile/{user}', [App\Http\Controllers\Front\UserController::class, 'show'])->name('user.show');
Route::get('/account', [App\Http\Controllers\Front\UserController::class, 'account'])->name('user.account')->middleware('auth');
Route::post('/account/save', [App\Http\Controllers\Front\UserController::class, 'save'])->name('user.account.save')->middleware('auth');
Route::post('/account/pass', [App\Http\Controllers\Front\UserController::class, 'pass'])->name('user.account.pass')->middleware('auth');


Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\Front\HomeController::class, 'search'])->name('search');

Route::get('/become-freelancer', [App\Http\Controllers\Front\HomeController::class, 'freelancerForm'])->name('become.freelancer')->middleware('auth');
Route::post('/become-freelancer', [App\Http\Controllers\Front\HomeController::class, 'freelancerFormPost'])->name('become.freelancerFormPost')->middleware('auth');

Route::get('/orders', [App\Http\Controllers\Front\OrderController::class, 'index'])->name('order')->middleware('auth');
Route::post('/orders/{advert}/store', [App\Http\Controllers\Front\OrderController::class, 'store'])->name('order.store')->middleware('auth');


