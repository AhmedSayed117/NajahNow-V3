<?php

use App\Http\Controllers\Admin\Admin;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect('/');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/',[Admin::class,'index']);
    Route::get('/showGroup/{id}',[Admin::class,'showGroup'])->name('showGroup');
    Route::get('/add-group',[Admin::class,'add_group'])->name('add.group');
    Route::post('/add-group-to-DB',[Admin::class,'createGroup'])->name('createGroup');

});
