<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\QrCodeGeneratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home');
// routes for QR code generator
Route::get('/qr-list', [QrCodeGeneratorController::class, 'index'])->name('QrList::View');
Route::get('/update-qr/{shortened_url}', [QrCodeGeneratorController::class, 'update'])->name('QrList::Update');
Route::get('/delete-qr/{shortened_url}', [QrCodeGeneratorController::class, 'delete'])->name('QrList::Delete');


// play
Route::get('/play', [PlayController::class, 'index'])->name('Play::QR');
// api
Route::post('/create-qr-codes', [QrCodeGeneratorController::class, 'create'])->name('Create::QR');
Route::get('/api/all-qrcode/',[QrCodeGeneratorController::class, 'allQrCode'])->name('api.allQrCode');
