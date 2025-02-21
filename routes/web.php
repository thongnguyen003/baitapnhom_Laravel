<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\ProductController::class,'index']);
Route::post('/save',[App\Http\Controllers\ProductController::class,'save']);
Route::get('/show',[App\Http\Controllers\ProductController::class,'show']);

