<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;

Route::fallback(function () {
    return redirect('/');
});

Route::get('/',[UserController::class,'index']);

Auth::routes();
Route::post('/checkin', [UserController::class, 'checkin'])->name('checkin');
Route::post('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/group', [UserController::class, 'mygroup'])->name('mygroup');
Route::get('/group/{id}', [UserController::class, 'groups'])->name('groups');
Route::get('/login', [UserController::class, 'login']);
Route::post('/login-done', [UserController::class, 'login_done'])->name('login');

