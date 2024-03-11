<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokenGeneratorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('products', ProductController::class);

Route::post('token/generator', TokenGeneratorController::class);