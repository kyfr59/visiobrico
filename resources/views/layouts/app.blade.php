<!DOCTYPE html>
<html lang="fr" class="{{ $espace }}">

<head>
    <meta charset="UTF-8">
    <title>VisioBrico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

    <body class="min-w-fit lg:relative bg-gray-50">

        {{-- Header avec logo et menus --}}
        <header>
            @switch($espace)
                @case('requester')
                    @include('requester.navbar-top')
                    @include('partials.switcher')
                    @break
                @case('provider')
                    @include('provider.navbar-top')
                    @include('partials.switcher')
                    @break
                @default
                    @include('public.navbar-top')
            @endswitch
        </header>

        {{-- Contenu principal injecté par les pages --}}
        <div class="p-4 lg:pt-0 site">
            @yield('content')
        </div>

        {{-- Footer / Bottom menu mobile --}}
        <footer>
            @switch($espace)
                @case('requester')
                    @include('requester.navbar-bottom')
                    @break
                @case('provider')
                    @include('provider.navbar-bottom')
                    @break
                @default
            @endswitch
        </footer>

    </body>
</html>