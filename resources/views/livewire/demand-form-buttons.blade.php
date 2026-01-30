{{-- Boutons --}}
@props(['isGuest', 'desactivateSubmit' => false])
<div class="flex justify-end space-x-3 pt-2 border-gray-100 mt-4">

    @if ($currentStep == 2)
        <button type="button"
                wire:click="$dispatch('step1')"
                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Précédent
        </button>
    @else
        <button type="button"
                wire:click="requestClose"
                wire:loading.attr="disabled"
                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Annuler
        </button>
    @endif

    <button type="submit"
        @if ($desactivateSubmit) disabled @endif
        class="cursor-pointer bg-gradient-to-r from-orange-500 to-orange-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-orange-600 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl  disabled:bg-gray-400 disabled:cursor-not-allowed">
        {{ $isGuest ? 'Publier ma demande' : 'Créer la demande' }}
    </button>
</div>