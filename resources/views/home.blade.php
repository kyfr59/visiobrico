<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>VisioBrico</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <header>
        <h1>Bienvenue sur VisioBrico</h1>
    </header>
    <button class="btn btn-primary">
        FlyonUI Test
    </button>
    @yield('content')
</body>
</html>