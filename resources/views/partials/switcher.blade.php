
<div id="switcher" class="sticky top-0 z-40 w-full bg-gray-100 border-gray-300 border-y lg:w-min lg:bg-transparent lg:border-0">
    <div class="px-4 py-3 ">
        <div class="flex items-center gap-3">
            <a href="{{ route('demandeur.accueil') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2-500 bg-linear-to-r from-orange-500 to-orange-600 prestataire:from-white prestataire:to-white prestataire:text-gray-500 text-white shadow-md shadow-orange-200 prestataire:shadow-none text-nowrap">
                Espace Demandeur
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-orange-500 border-2 border-white rounded-full -top-2 -right-2 prestataire:bg-gray-400 prestataire:outline prestataire:outline-gray-300">8</div>
            </a>
            <a href="{{ $espace === 'prestataire' ? route('demandeur.accueil') : route('prestataire.accueil') }}">
                <x-icon-double-arrows />
            </a>
            <a href="{{ route('prestataire.accueil') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-white text-gray-500 hover:bg-gray-50 bg-linear-to-r prestataire:from-blue-500 prestataire:to-blue-600 prestataire:text-white prestataire:shadow-md prestataire:shadow-blue-200 text-nowrap">
                Espace Prestataire
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-gray-400 border-2 border-white rounded-full -top-2 -right-2 outline outline-gray-300 prestataire:bg-blue-500 prestataire:outline-0">4</div>
            </a>
        </div>
    </div>
</div>