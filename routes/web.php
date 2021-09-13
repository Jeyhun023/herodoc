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

//Jobs
Route::get('/advertisements', [App\Http\Controllers\Front\AdvertController::class, 'index'])->name('advert.index');
Route::get('/advertisements/{slug}', [App\Http\Controllers\Front\AdvertController::class, 'show'])->name('advert.show');
//Messages
Route::get('/messages', [App\Http\Controllers\Front\MessageController::class, 'index'])->name('message.index');
Route::get('/loadChats', [App\Http\Controllers\Front\MessageController::class, 'loadChats'])->name('message.loadChats');
Route::get('/applyChat/{user}', [App\Http\Controllers\Front\MessageController::class, 'applyChat'])->name('message.applyChat');

Route::get('/messages/{chat}', [App\Http\Controllers\Front\MessageController::class, 'show'])->name('message.show');
Route::get('/lastMessages/{chat}', [App\Http\Controllers\Front\MessageController::class, 'lastMessages'])->name('message.lastMessages');
Route::post('/sendMessages/{chat}', [App\Http\Controllers\Front\MessageController::class, 'sendMessages'])->name('message.sendMessages');

Route::get('/profile/{user}', [App\Http\Controllers\Front\UserController::class, 'show'])->name('user.show');


Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('index');

//Not ready
Route::get('/become-freelancer', [App\Http\Controllers\Front\HomeController::class, 'freelancerForm'])->name('become.freelancer');

Auth::routes();