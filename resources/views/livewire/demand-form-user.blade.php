
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
        <div class="">
            <div class="relative rounded-2xl border border-gray-300 bg-gray-100 p-5 shadow-inner">

                {{-- Header --}}
                <div class="flex flex-col items-start mb-8">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 p-2 rounded-xl bg-orange-500">
                            {{-- Icône info --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
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

                {{-- Pseudo --}}
                <div class="mb-6">
                    <label class="form-label">
                        <x-icon-user class="text-orange-500" />
                        Choisissez un pseudo <span class="text-orange-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text"
                            required
                            x-on:input="
                                if ($el.value.trim() === '') {
                                    $el.blur()
                                }
                            "
                            wire:model.defer="pseudo"
                            class="form-input @error('pseudo') form-input-error @elseif (!empty($pseudo)) form-input-valid @enderror"
                            wire:blur="validatePseudo"
                        />
                        @error('pseudo')
                            <x-icon-field-invalid />
                        @elseif (!empty($pseudo))
                            <x-icon-field-valid />
                        @endif
                    </div>
                    @error('pseudo')
                        <span class="form-error">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </span>
                    @enderror
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
