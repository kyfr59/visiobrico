<div>
    {{-- Bouton pour ouvrir la modale --}}
    <a wire:click="openModal" class="py-2 lg:py-5 btn-menu flex mt-4 lg:mt-0 text-gray-700">
        <x-icon-plus class="lg:text-orange-500" />
        Nouvelle demande
    </a>

    {{-- Bouton pour ouvrir la modale --}}
    @if($isOpen)

        {{-- Overlay --}}
        <div class="fixed inset-0 bg-black/70 z-40" wire:click="closeModal"></div>

        {{-- Wrapper --}}
        <div class="fixed inset-0 z-50 flex justify-center items-start sm:items-center">

            {{-- Modal --}}
            <div
                class="bg-white w-full
                    h-[100dvh] sm:h-auto
                    max-w-2xl sm:max-w-3xl
                    rounded-b-2xl sm:rounded-3xl
                    shadow-2xl
                    overflow-hidden
                    flex flex-col"
                @click.stop
            >
                {{-- Contenu scrollable --}}
                <div class="flex-1 overflow-y-auto">
                    @if($currentStep == 1)
                        <livewire:demand-form-header />
                        <livewire:demand-form-demand />
                    @elseif($currentStep == 2)
                        <livewire:demand-form-header />
                        <livewire:demand-form-user />
                    @endif
                </div>

            </div>
        </div>
    @endif
</div>