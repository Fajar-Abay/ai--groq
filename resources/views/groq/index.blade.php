<!-- resources/views/groq/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groq API</title>
</head>
<body>
    <form action="{{ route('groq.generate') }}" method="POST">
        @csrf
        <label for="input_data">Input Data:</label>
        <textarea name="input_data" id="input_data" required></textarea>
        <button type="submit">Generate</button>
    </form>

    @if($errors->any())
        <div>
            <strong>Error:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
