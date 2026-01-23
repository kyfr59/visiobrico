<div class="fixed bottom-0 z-50 w-full pt-8 lg:hidden bt-5">
    <div class="border-y shadow-[0_-6px_24px_rgba(0,0,0,0.12)] border-gray-300 bg-white relative px-0 py-3 flex justify-between md:justify-around items-center">

        <a href="{{ route('requester.home') }}" class="text-center w-[100px] h-[50px] flex flex-col items-center text-xs font-medium {{ request()->routeIs('requester.home') ? 'text-orange-500' : 'text-gray-400' }} provider:text-blue-500">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            Accueil
        </a>
        <a href="{{ route('requester.profile') }}" class="text-center w-[130px] h-[50px] flex flex-col items-center pr-12  text-xs {{ request()->routeIs('requester.profile') ? 'text-orange-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
            </svg>
            En attente
        </a>

        <div class="absolute -translate-x-1/2 -top-7 left-1/2">
            <a href="{{ route('requester.demand') }}"
                class="flex items-center justify-center text-white bg-orange-500 border-4 rounded-full shadow-lg w-14 h-14 provider:bg-blue-500">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 5v14M5 12h14" />
                </svg>
                <div class="absolute flex pt-23 text-xs text-center text-gray-400 w-14">Nouvelle demande</div>
            </a>
        </div>

        <a href="{{ route('requester.profile') }}" class="text-center w-[130px] h-[50px] flex flex-col items-center pl-12 text-xs {{ request()->routeIs('requester.profile') ? 'text-orange-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M6 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
            </svg>
            Mon Profil
        </a>
        <a href="{{ route('requester.demands') }}" class="text-center w-[100px] h-[50px] flex flex-col items-center text-xs {{ request()->routeIs('requester.demands') ? 'text-orange-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
            </svg>
            Mes demandes
        </a>
    </div>
</div>