{{-- resources/views/groq/result.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Generasi</title>
</head>
<body>
    <h1>Hasil Generasi</h1>
    <p>{{ $resultMessage }}</p>
    <a href="{{ route('groq.index') }}">Kembali</a>
</body>
</html>
