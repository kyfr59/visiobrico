<nav id="nav" class="bg-white border-b lg:py-4 border-gray-300 lg:mb-10">
    <div class="relative flex justify-between h-16 pl-4 site lg:pr-0">
        @include('partials.logo')
        <div id="menu" class="absolute left-0 z-50 hidden w-full overflow-hidden transition-all duration-700 bg-gray-100 lg:bg-white border-gray-300 shadow-lg max-h-0 top-[65px] lg:justify-end lg:flex lg:static lg:max-h-full lg:border-none lg:shadow-none">
            <a href="{{ route('prestataire.recherche') }}" class="mt-4 py-2 btn-menu flex lg:mt-0 text-gray-700">
                <x-icon-tools class="lg:text-orange-500" />
                <span>Proposer mes services</span>
            </a>
            <a href="{{ route('prestataire.propositions') }}" class="py-2 btn-menu flex text-gray-700">
                <x-icon-list class="lg:text-orange-500" />
                <span>Mes propositions</span>
            </a>
            <a href="{{ route('prestataire.profil') }}" class="py-2 mb-4 btn-menu lg:mb-0 flex text-gray-700">
                <x-icon-user class="lg:text-orange-500" />
                <span>Mon profil</span>
            </a>
        </div>
        <div class="m-2 lg:hidden">
            <button id="mobile-menu-button" class="relative p-2" aria-label="Menu" aria-expanded="false">
                <x-icon-menu class="text-gray-900" />
            </button>
        </div>
    </div>
</nav>

