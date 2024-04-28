<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\QrCodeGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home');
// routes for QR code generator
Route::get('/qr-list', [QrCodeGeneratorController::class, 'index'])->name('QrList::View');
// api
Route::post('/create-qr-codes', [QrCodeGeneratorController::class, 'create'])->name('Create::QR');

