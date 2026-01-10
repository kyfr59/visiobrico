<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>VisioBrico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <nav class="flex flex-wrap justify-between items-center bg-white sticky top-0 z-50">

        <div class="max-w-7xl px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 bg-orange-500 prestataire:bg-blue-500 rounded-lg flex items-center justify-center">
                        <!-- prettier-ignore -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video w-5 h-5 text-white" aria-hidden="true">
                        <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"></path>
                        <rect x="2" y="6" width="14" height="12" rx="2"></rect>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-semibold leading-tight">VisioBrico</span>
                        <span class="text-[10px] text-gray-500 leading-tight">Pensez visio pour vos travaux</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-4">
            <button class="p-2">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div class="w-full sticky z-40 bg-gray-100 border-y border-gray-300">
            <div class=" px-4 py-3">
                <div class="flex items-center gap-3">
                    <button id="toggle-bricoleur"
                        class="border border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2-500 bg-linear-to-r from-orange-500 to-orange-600 prestataire:from-white prestataire:to-white prestataire:text-gray-500 text-white shadow-md shadow-orange-200 prestataire:shadow-none">
                        <!-- prettier-ignore -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-4 h-4 mr-2" aria-hidden="true"><path                           d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"></path></svg>Espace Bricoleur
                    </button>
                    <!-- prettier-ignore -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-right w-4 h-4 text-gray-500" aria-hidden="true">
                    <path d="M8 3 4 7l4 4"></path>
                    <path d="M4 7h16"></path>
                    <path d="m16 21 4-4-4-4"></path>
                    <path d="M20 17H4"></path>
                    </svg>
                    <button id="toggle-prestataire"
                        class="border border-gray-300  cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-white text-gray-600 hover:bg-gray-50 bg-linear-to-r prestataire:from-blue-500 prestataire:to-blue-600 prestataire:text-white prestataire:shadow-md prestataire:shadow-blue-200">
                        <!-- prettier-ignore -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase w-4 h-4" aria-hidden="true">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                        </svg>Espace Prestataire
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>
