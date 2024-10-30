<!-- resources/views/groq/index.blade.php -->
@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('title', 'Groq AI') <!-- Mengatur title halaman -->

@section('content') <!-- Konten spesifik untuk halaman ini -->
    <div class="container">
        <h1>Tanya Groq AI</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('partials.form') <!-- Memasukkan partial form -->

        @if (isset($resultMessage))
            <h2>Hasil dari Groq AI</h2>
            <p id="resultMessage">{{ $resultMessage }}</p>
        @endif
    </div>
@endsection
