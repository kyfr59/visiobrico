{{-- En-tête --}}
<div class="p-4 lg:p-8 border-b relative bg-white border-gray-300">
    <div class="flex items-center justify-between">
        <div class="flex items-start gap-3 md:gap-4">
            <div class="p-3 bg-gradient-to-br from-orange-100 to-orange-50 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lucide lucide-sparkles w-6 h-6 md:w-7 md:h-7 text-orange-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl lg:text-3xl font-bold text-gray-900 mb-0.5 md:mb-1">
                    Publier une demande
                </h2>
                <p class="text-gray-600 text-xs md:text-sm">
                    Merci de remplir les champs ci-après
                </p>
            </div>
        </div>
        <button tabindex="-1" class="hover:bg-gray-200 cursor-pointer p-0.5 rounded-xl transition-all duration-300 text-gray-500 hover:text-gray-700" wire:click="requestClose">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-6 h-6" aria-hidden="true">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
</div>