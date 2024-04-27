<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\QrCodeGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home');
// routes for QR code generator
Route::post('/shortener-url', [LinkController::class, 'create'])->name('Create::Shortener');

// api
Route::post('/create-qr-codes', [QrCodeGeneratorController::class, 'create'])->name('Create::QR');

