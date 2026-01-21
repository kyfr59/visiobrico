<div class="fixed bottom-0 z-50 w-full pt-8 lg:hidden bt-5">
    <div class="border-y shadow-[0_-6px_24px_rgba(0,0,0,0.12)] border-gray-300 bg-white relative px-0 py-3 flex justify-between md:justify-around items-center">

        <a href="{{ route('prestataire.accueil') }}" class="text-center w-[100px] h-[50px] flex flex-col items-center text-xs font-medium {{ request()->routeIs('prestataire.accueil') ? 'text-blue-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            Accueil
        </a>
        <a href="{{ route('prestataire.propositions') }}" class="text-center w-[130px] h-[50px] flex flex-col items-center pr-12  text-xs {{ request()->routeIs('demandeur.profil') ? 'text-blue-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
            </svg>
            En attente
        </a>

        <div class="absolute -translate-x-1/2 -top-7 left-1/2">
            <a href="{{ route('prestataire.recherche') }}"
                class="flex items-center justify-center text-white bg-blue-500 border-4 rounded-full shadow-lg w-14 h-14">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
                </svg>
                <div class="w-[75px] absolute flex pt-23 text-xs text-center text-gray-400 w-14">Proposer mes services</div>
            </a>
        </div>

        <a href="{{ route('prestataire.profil') }}" class="text-center w-[130px] h-[50px] flex flex-col items-center pl-12 text-xs {{ request()->routeIs('prestataire.profil') ? 'text-blue-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M6 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
            </svg>
            Mon Profil
        </a>
        <a href="{{ route('prestataire.propositions') }}" class="text-center w-[100px] h-[50px] flex flex-col items-center text-xs {{ request()->routeIs('prestataire.propositions') ? 'text-blue-500' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
            </svg>
            Propositions
        </a>
    </div>
</div>