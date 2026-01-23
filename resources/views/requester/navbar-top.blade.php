<nav id="nav" class="bg-white lg:border-b lg:py-4 lg:border-gray-300 lg:mb-10">
    <div class="relative flex justify-between h-16 pl-4 site lg:pr-0">
        @include('partials.logo')
        <div id="menu" class="absolute left-0 z-50 hidden w-full overflow-hidden transition-all duration-700 bg-white border-gray-300 shadow-lg max-h-0 top-33 lg:justify-end lg:flex lg:static lg:max-h-full lg:border-none lg:shadow-none">
            <div class="lg:hidden">
                @include('partials.loginbar')
            </div>
            <a href="{{ route('requester.demand') }}" class="mt-4 py-2 btn-menu flex lg:mt-0 text-gray-700">
                <x-icon-plus class="lg:text-orange-500" />
                <span>Nouvelle demande</span>
            </a>
            <a href="{{ route('requester.demands') }}" class="py-2 btn-menu flex text-gray-700">
                <x-icon-list class="lg:text-orange-500" />
                <span>Mes demandes</span>
            </a>
            <a href="{{ route('requester.profile') }}" class="py-2 mb-4 btn-menu lg:mb-0 flex lg:hidden text-gray-700">
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
            @include('partials.loginbar')
        </div>
    </div>
</nav>