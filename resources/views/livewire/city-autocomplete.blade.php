<div class="relative w-full" x-data="{
    open: @entangle('showDropdown'),
    localQuery: @entangle('query')
}"
@click.outside="
alert('dd');
    open = false;
    // Vider le champ seulement si rien n'est sélectionné
    if (!$wire.selectedCity || $wire.selectedCity === '') {
        $wire.set('query', '');
        localQuery = '';
    }
">
    <label class="form-label">
    <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-orange-500" aria-hidden="true">
        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
        <circle cx="12" cy="10" r="3"></circle>
        </svg>
        <span>Ville</span>
    </div>
    <span class="mt-0.5 text-xs font-normal text-gray-500 whitespace-nowrap">
        {{ $helpText }}
    </span>
    </label>

    <div class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lucide lucide-map-pin absolute left-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400 z-200">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>

        {{-- Cross button to delete field content --}}
        <button
            type="button"
            x-show="localQuery && localQuery.length > 0"
            wire:click="clearSearch"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-1.5 rounded-full hover:bg-gray-100 transition-colors hover:cursor-pointer"
            aria-label="Effacer la recherche"
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x text-gray-400 hover:text-gray-600">
                <path d="M18 6 6 18"/>
                <path d="m6 6 12 12"/>
            </svg>
        </button>

        {{-- Input field --}}
        <input
            id="location"
            wire:model.live.debounce.300ms="query"
            placeholder="Saisissez une ville"
            autocomplete="off"
            type="text"
            class="form-input with-icon"
            :class="{ 'rounded-b-none border-b-orange-300': open && @js(count($cities) > 0) }"
            x-model="localQuery"
            @focus="open = true"
            @blur="
                // Delay pour laisser le click sur une ville se traiter
                setTimeout(() => {
                    open = false;
                    if (!$wire.selectedCity || $wire.selectedCity === '') {
                        localQuery = '';
                        $wire.set('query', '');
                    }
                }, 100);
                "
            >

        @if($showDropdown && count($cities) > 0)
        <ul class="absolute z-10 w-full bg-white border-2 border-gray-200 rounded-b-xl shadow-xl shadow-orange-100/30 mt-[1px] border-t-2">
            {{-- List header --}}
            <li class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-white">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700">Suggestions</span>
                    <span class="text-xs text-orange-600 bg-orange-100 px-2 py-1 rounded-full">
                    {{ count($cities) }} résultat{{ count($cities) > 1 ? 's' : '' }}
                    </span>
                </div>
            </li>

            {{-- Cities list results --}}
            @foreach($cities as $city)
            <li
                wire:click="selectCity('{{ $city['nom'] }} ({{ $city['codeDepartement'] }})')"
                @click="open = false"
                class="px-4 py-3 hover:bg-gradient-to-r hover:from-orange-50/80 hover:to-white cursor-pointer border-b border-gray-100 last:border-b-0 transition-all duration-200 group hover:border-orange-100 hover:scale-[1.002] hover:shadow-sm"
            >
                <div class="flex items-center gap-3">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-gray-400 group-hover:text-orange-500 transition-colors">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                    <span class="font-semibold group-hover:text-orange-700 transition-colors">{{ $city['nom'] }}</span>
                    </div>
                    @if(isset($city['codesPostaux']))
                    <p class="text-sm text-gray-500 mt-0.5 group-hover:text-orange-500 transition-colors">
                        @php
                            $codes = $city['codesPostaux'] ?? [];
                        @endphp
                        Code{{ count($codes) > 1 ? 's' : '' }} post{{ count($codes) > 1 ? 'aux' : 'al' }} :
                        {{ implode(', ', $codes) }}
                    </p>
                    @endif
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lucide lucide-chevron-right text-gray-300 group-hover:text-orange-400 transition-colors size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
            </div>
            </li>
            @endforeach

            {{-- List footer --}}
            <li class="px-4 py-3 border-t border-gray-100 bg-gray-50/50 rounded-b-xl">
            <p class="text-xs text-gray-500 text-center">
                Merci de sélectionner une ville dans la liste
            </p>
            </li>
        </ul>
        @endif
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function checkElements() {
            const containers = document.querySelectorAll('.relative.w-full.max-w-md');
            containers.forEach(container => {
                const dropdown = container.querySelector('ul');
                const input = container.querySelector('input[type="text"]');
            });
        }
        setTimeout(checkElements, 1000);

        // Ferme les dropdowns
        function closeDropdowns() {
            const allDropdowns = document.querySelectorAll('.relative.w-full.max-w-md ul');
            allDropdowns.forEach(dropdown => {
                dropdown.style.display = 'none';
                dropdown.style.visibility = 'hidden';
                dropdown.style.opacity = '0';
                dropdown.style.pointerEvents = 'none';
                dropdown.classList.add('hidden');
            });

            // Réinitialiser les inputs
            const inputs = document.querySelectorAll('.relative.w-full.max-w-md input[type="text"]');
            inputs.forEach(input => {
                input.classList.remove('rounded-b-none', 'border-b-orange-300');
                input.classList.add('rounded-xl');
                input.value = '';
            });
        }

        document.addEventListener('click', function(e) {
            const locationContainer = e.target.closest('.relative.w-full.max-w-md');
            if (!locationContainer) {
                if (!isCitySelected()) {
                closeDropdowns();
                }
            }
        });

        const location = document.getElementById('location');
        function isCitySelected() {
        return location.value ? true : false;
        }
        window.testCloseDropdowns = closeDropdowns;
    });
</script>
@endsection