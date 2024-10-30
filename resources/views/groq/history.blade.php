<!-- resources/views/groq/history.blade.php -->
@extends('layouts.app')

@section('title', 'Riwayat Pertanyaan')

@section('content')
    <div class="container">
        <h1>Riwayat Pertanyaan</h1>
        <ul class="list-unstyled">
            @if ($histories->count() > 0)
                @foreach ($histories as $history)
                    <li class="mb-3">
                        <strong>Pertanyaan:</strong> {{ $history->question }}<br>
                        <strong>Jawaban:</strong> {{ $history->answer }}
                    </li>
                    <hr>
                @endforeach
            @else
                <li>Tidak ada riwayat pertanyaan.</li>
            @endif
        </ul>
    </div>
@endsection
