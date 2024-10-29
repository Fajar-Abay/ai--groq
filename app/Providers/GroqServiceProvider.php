<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LucianoTonet\GroqPHP\Groq;

class GroqServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Groq::class, function ($app) {
            // Menggunakan env() untuk mendapatkan API Key
            $apiKey = env('GROQ_API_KEY');

            // Debug untuk memastikan apiKey terisi
            if (!$apiKey) {
                throw new \Exception('API Key untuk Groq belum diset.');
            }
            
            return new Groq($apiKey);
        });
    }

    public function boot()
    {
        // Anda bisa menambahkan kode di sini jika diperlukan saat provider di-boot
    }
}
