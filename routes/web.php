<?php

use App\Http\Controllers\GroqController;
use Illuminate\Support\Facades\Route;

Route::get('/groq', [GroqController::class, 'index'])->name('groq.index');
Route::post('/groq/generate', [GroqController::class, 'generate'])->name('groq.generate');
