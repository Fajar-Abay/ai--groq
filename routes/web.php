<?php

use App\Http\Controllers\GroqController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', [GroqController::class, 'index'])->name('groq.index');

// Rute untuk menghasilkan respons
Route::post('/groq/generate', [GroqController::class, 'generate'])->name('groq.generate');

// Rute untuk halaman riwayat
Route::get('/groq/history', [GroqController::class, 'history'])->name('groq.history');
