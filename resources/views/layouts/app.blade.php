<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh; /* Sidebar penuh tinggi viewport */
            position: fixed; /* Tetap di tempat saat scroll */
            top: 0;
            left: 0;
            z-index: 100; /* Di atas konten lain */
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 15px; /* Padding dalam sidebar */
        }
        .content {
            margin-left: 220px; /* Margin kiri untuk konten agar tidak tertutup sidebar */
            padding: 20px; /* Padding dalam konten */
        }
        .error {
            color: red; /* Warna untuk pesan kesalahan */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul class="list-unstyled">
            <li><a href="{{ route('groq.index') }}" class="text-decoration-none">Beranda</a></li>
            <li><a href="{{ route('groq.history') }}" class="text-decoration-none">Riwayat</a></li>
            <li><a href="#" class="text-decoration-none">Tentang</a></li>
            <li><a href="#" class="text-decoration-none">Kontak</a></li>
        </ul>
    </div>

    <div class="content">
        @yield('content') <!-- Tempat untuk konten halaman spesifik -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
