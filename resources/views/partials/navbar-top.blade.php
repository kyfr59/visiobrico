<nav id="nav" class="w-full bg-white lg:border-b lg:py-4 lg:border-gray-300 lg:mb-10">
    <div class="relative flex justify-between h-16 pl-4 site lg:pr-0">
        <a href="{{ route('home') }}" alt="Pensez visio pour vos travaux" id="logo" class="flex items-center gap-2 whitespace-nowrap">
            <x-icon-logo />
            <div class="flex flex-col">
                <span class="text-xl font-semibold leading-tight">VisioBrico</span>
                <span class="text-[10px] text-gray-500 leading-tight">Pensez visio pour vos travaux</span>
            </div>
        </a>
        <div id="menu" class="absolute left-0 z-50 hidden w-full overflow-hidden transition-all duration-700 bg-white border-gray-300 shadow-lg max-h-0 top-33 lg:justify-end lg:flex lg:static lg:max-h-full lg:border-none lg:shadow-none">

            <div class="px-4 py-3 border-b border-gray-300 lg:hidden">
                <div class="flex items-center gap-3 lg:hidden">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&amp;h=400&amp;fit=crop" alt="Jean Dupont" class="object-cover w-12 h-12 rounded-full">
                    </a>
                    <div class="flex-1">
                        <a href="#" class="block font-medium text-gray-900">Jean Dupont</a>
                        <a href="#" class="text-sm text-gray-500">Se déconnecter</a>
                    </div>
                </div>
            </div>
            <button class="mt-4 btn-menu lg:mt-0">
                <x-icon-profile class="lg:hidden" />
                <span>Mon profil</span>
            </button>
            <button class="btn-menu">
                <x-icon-profile class="lg:hidden" />
                <span class="whitespace-nowrap">Mes réservations</span>
            </button>
            <button class="btn-menu">
                <x-icon-profile class="lg:hidden" />
                <span>Mes favoris</span>
            </button>
            <button class="mb-4 btn-menu lg:mb-0">
                <x-icon-profile class="lg:hidden" />
                <span>Messages</span>
                <!--<span class="ml-auto prestataire:bg-blue-500  bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">8</span>-->
            </button>
        </div>
        <div class="m-2 lg:hidden">
            <button id="mobile-menu-button" class="relative p-2" aria-label="Menu" aria-expanded="false">
                <x-icon-menu class="text-gray-900" />
            </button>
        </div>
        <div class="hidden lg:flex shrink-0">
            <button class="flex items-center gap-2 transition-opacity">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop" alt="Jean Dupont" class="object-cover w-10 h-10 border-2 border-gray-200 rounded-full hover:opacity-80">
                </a>
                <div class="flex-col items-start hidden md:flex">
                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-black">Jean Dupont</a>
                    <a href="#" class="text-xs text-gray-500 hover:underline">Se déconnecter</a>
                </div>
            </button>
        </div>
    </div>
</nav>

<div id="switcher" class="sticky top-0 z-40 w-full bg-gray-100 border-gray-300 border-y lg:w-min lg:bg-transparent lg:border-0">
    <div class="px-4 py-3 ">
        <div class="flex items-center gap-3">
            <a href="{{ route('demandeur.home') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2-500 bg-linear-to-r from-orange-500 to-orange-600 prestataire:from-white prestataire:to-white prestataire:text-gray-500 text-white shadow-md shadow-orange-200 prestataire:shadow-none text-nowrap">
                Espace Demandeur
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-orange-500 border-2 border-white rounded-full -top-2 -right-2 prestataire:bg-gray-400 prestataire:outline prestataire:outline-gray-300">8</div>
            </a>
            <x-icon-switch-spaces />
            <a href="{{ route('prestataire.home') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-white text-gray-500 hover:bg-gray-50 bg-linear-to-r prestataire:from-blue-500 prestataire:to-blue-600 prestataire:text-white prestataire:shadow-md prestataire:shadow-blue-200 text-nowrap">
                Espace Prestataire
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-gray-400 border-2 border-white rounded-full -top-2 -right-2 outline outline-gray-300 prestataire:bg-blue-500 prestataire:outline-0">4</div>
            </a>
        </div>
    </div>
</div>