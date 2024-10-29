<?php

namespace App\Http\Controllers;

use LucianoTonet\GroqPHP\Groq;
use Illuminate\Http\Request;

class GroqController extends Controller
{
    protected $groq;

    public function __construct(Groq $groq)
    {
        $this->groq = $groq;
    }

    public function index()
    {
        // Menampilkan halaman utama atau formulir
        return view('groq.index'); // Pastikan ada view di resources/views/groq/index.blade.php
    }

    public function generate(Request $request)
    {
        // Validasi input
        $request->validate([
            'input_data' => 'required|string',
        ]);
    
        try {
            // Ambil data dari request
            $inputData = $request->input('input_data');
    
            // Tentukan model yang ingin Anda gunakan
            $model = 'llama3-8b-8192'; // Ganti dengan model yang sesuai
    
            // Siapkan pesan yang diperlukan
            $messages = [
                [
                    'role' => 'user',
                    'content' => $inputData, // Pastikan ini adalah string
                ],
            ];
    
            // Panggil metode completions
            $response = $this->groq->chat()->completions()->create([
                'model' => $model,
                'messages' => $messages,
                'stream' => false // Ubah ke false jika tidak ingin streaming
            ]);
    
          
    
            // Proses respons dan ambil hasil yang relevan
          // Proses respons dan ambil hasil yang relevan
            $resultMessage = $response['choices'][0]['message']['content'] ?? 'Tidak ada hasil yang ditemukan.';

            // Tampilkan hasil di view
            return view('groq.result', compact('resultMessage'));

    
        } catch (\Exception $e) {
            // Menangkap dan menampilkan kesalahan jika ada
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    
}