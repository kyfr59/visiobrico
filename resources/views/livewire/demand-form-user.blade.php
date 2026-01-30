
<form wire:submit.prevent="submitForm" class="p-6 bg-gray-50 overflow-y-auto max-h-[100vh] lg:max-h-[80vh]">

    {{-- Email --}}
    @if($isGuest)
        <div class="mb-6">
            <label class="form-label">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
                Votre e-mail <span class="text-orange-500">*</span>
            </label>
            <div class="relative">
                <input type="text"
                    required
                    x-on:input="
                        if ($el.value.trim() === '') {
                            $el.blur()
                        }
                    "
                    wire:model.defer="email"
                    class="form-input @error('email') form-input-error @elseif (!empty($email)) form-input-valid @enderror"
                    placeholder="Ex : Fuite sous l'évier de cuisine"
                    wire:blur="validateEmail"
                />

                @error('email')
                    <x-icon-field-invalid />
                @elseif (!empty($email))
                    <x-icon-field-valid />
                @endif
            </div>
            @error('email')
                <span class="form-error">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                </span>
            @enderror
        </div>
    @endif

    {{-- Infos complémentaires pour création de compte --}}
    @if($showExtraInfo)
        <div class="mb-8">
            <div class="relative rounded-2xl border border-gray-200 bg-gradient-to-r from-gray-50 via-gray-100/60 to-gray-50 p-5 shadow-inner">

                {{-- Header --}}
                <div class="flex flex-col items-start">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-xl bg-orange-500">
                            {{-- Icône info --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01" />
                                <circle cx="12" cy="12" r="9" />
                            </svg>
                        </div>
                        <span class="ml-4 font-semibold">
                            Création de votre compte
                        </span>
                    </div>
                    <div class="mt-2 text-sm  mt-1">
                        Cet e-mail n’est pas encore associé à un compte.
                        Merci de compléter les informations suivantes pour finaliser votre demande.
                    </div>
                </div>

                {{-- Avatar --}}
                <div class="mt-4">
                    <div
                        class="mb-6"
                        wire:listen.city-selected="updateCity($event.detail.city)"
                    >
                        <livewire:avatar-upload help-text="À titre indicatif" />
                    </div>
                </div>

                {{-- Ville --}}
                <div class="mt-4">
                    <div
                        class="mb-6"
                        wire:listen.city-selected="updateCity($event.detail.city)"
                    >
                        <livewire:city-autocomplete help-text="" />
                    </div>
                </div>

                {{-- Décor --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-orange-300 rounded-full blur-3xl opacity-20"></div>
            </div>
        </div>
    @endif


    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="my-4 rounded-xl border border-red-300 bg-red-50 p-4">
            <p class="font-bold flex text-red-700 mb-2">
                <x-icon-warning class="w-6 h-6 mr-2" /><span>Merci de corriger {{ count($errors->all()) > 1 ? "les erreurs suivantes" : "l'erreur suivante" }} :
            </p>
            <ul class="ml-3 list-disc list-inside text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Boutons --}}
    <livewire:demand-form-buttons :isGuest="$isGuest" :desactivateSubmit="$desactivateSubmit" :currentStep="$currentStep" />

</form>