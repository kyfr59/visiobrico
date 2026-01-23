
<div id="switcher" class="sticky top-0 z-40 w-full bg-gray-100 border-gray-300 border-y lg:w-min lg:bg-transparent lg:border-0">
    <div class="px-4 py-3 ">
        <div class="flex items-center gap-3">
            <a href="{{ route('requester.home') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2-500 bg-linear-to-r from-orange-500 to-orange-600 provider:from-white provider:to-white provider:text-gray-500 text-white shadow-md shadow-orange-200 provider:shadow-none text-nowrap">
                Espace Demandeur
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-orange-500 border-2 border-white rounded-full -top-2 -right-2 provider:bg-gray-400 provider:outline provider:outline-gray-300">8</div>
            </a>
            <a href="{{ $espace === 'provider' ? route('requester.home') : route('requester.home') }}">
                <x-icon-double-arrows />
            </a>
            <a href="{{ route('provider.home') }}"
                class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-white text-gray-500 hover:bg-gray-50 bg-linear-to-r provider:from-blue-500 provider:to-blue-600 provider:text-white provider:shadow-md provider:shadow-blue-200 text-nowrap">
                Espace Prestataire
                <div class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-gray-400 border-2 border-white rounded-full -top-2 -right-2 outline outline-gray-300 provider:bg-blue-500 provider:outline-0">4</div>
            </a>
        </div>
    </div>
</div>
