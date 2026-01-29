<div>
    {{-- Bouton pour ouvrir la modale --}}
    <a wire:click="openModal" class="py-2 lg:py-5 btn-menu flex mt-4 lg:mt-0 text-gray-700">
        <x-icon-plus class="lg:text-orange-500" />
        Nouvelle demande
    </a>

    {{-- Bouton pour ouvrir la modale --}}
    @if($isOpen)

        {{-- Overlay --}}
        <div class="border fixed inset-0 bg-black/80 z-40 cursor-pointer" wire:click="closeModal"></div>

            <div class="fixed inset-0 z-40 flex items-center justify-center p-4 pointer-events-none">

                <div class="fixed top-[50px] left-1/2 transform -translate-x-1/2 pointer-events-auto bg-white rounded-xl lg:rounded-3xl shadow-2xl w-full lg:max-w-3xl max-w-2xl p-0 z-50" @click.stop>
                    @if($currentStep == 1)
                        <livewire:demand-form-header />
                        <livewire:demand-form-demand :demand="$demand" :wire:key="'demand'" />
                    @elseif($currentStep == 2)
                        <livewire:demand-form-header />
                        <livewire:demand-form-user :user="$user" :wire:key="'user'" />
                    @elseif($currentStep == 3)
                        <livewire:demand-form-confirmation :demand="$demand" :user="$user" :wire:key="'confirmation'" />
                        <div class="flex justify-between mt-4">
                            <button wire:click="decreaseStep" class="bg-gray-300 px-4 py-2 rounded">Précédent</button>
                            <button wire:click="submitForm" class="bg-green-500 text-white px-4 py-2 rounded">Confirmer</button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
</div>