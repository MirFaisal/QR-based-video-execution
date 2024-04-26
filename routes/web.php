<?php

use App\Http\Controllers\QrCodeGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/qr-codes', [QrCodeGeneratorController::class, 'create'])->name('Create::QR');

