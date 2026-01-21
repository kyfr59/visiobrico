<nav id="nav" class="bg-white lg:border-b lg:py-4 lg:border-gray-300 lg:mb-10">
    <div class="relative flex justify-between h-16 pl-4 site lg:pr-0">
        @include('partials.logo')
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
            <a href="{{ route('demandeur.demande') }}" class="mt-4 py-2 btn-menu flex lg:mt-0 text-gray-700">
                <x-icon-plus class="lg:text-orange-500" />
                <span>Nouvelle demande</span>
            </a>
            <a href="{{ route('demandeur.demandes') }}" class="py-2 btn-menu flex text-gray-700">
                <x-icon-list class="lg:text-orange-500" />
                <span>Mes demandes</span>
            </a>
            <a href="{{ route('demandeur.profil') }}" class="py-2 mb-4 btn-menu lg:mb-0 flex lg:hidden text-gray-700">
                <x-icon-user />
                <span>Mon profil</span>
                <!--<span class="ml-auto bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">8</span>-->
            </a>
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