<?php

namespace App\Http\Controllers;

use LucianoTonet\GroqPHP\Groq;
use Illuminate\Http\Request;
use App\Models\History; // Import model History

class GroqController extends Controller
{
    protected $groq,$histories;

    public function __construct(Groq $groq)
    {
        $this->groq = $groq;
    }

    public function index()
    {
        // Ambil semua riwayat
        $histories = History::latest()->get(); 
        return view('groq.index', compact('histories')); // Kirim data riwayat ke view
    }
    
    
 // Tambahkan import model History

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
        $resultMessage = $response['choices'][0]['message']['content'] ?? 'Tidak ada hasil yang ditemukan.';

        // Simpan ke dalam tabel histories
        History::create([
            'question' => $inputData,
            'answer' => $resultMessage,
        ]);

        // Ambil semua riwayat setelah menambahkan yang baru
        $histories = History::latest()->get();

        // Tampilkan hasil di view
        return view('groq.index', compact('resultMessage', 'histories'));

    } catch (\Exception $e) {
        // Menangkap dan menampilkan kesalahan jika ada
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

 

    public function history()
    {
        $histories = History::latest()->get();
        return view('groq.history', compact('histories'));
    }
}
