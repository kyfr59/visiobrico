<div x-data>
    <div class="flex items-center flex-col lg:flex-row gap-6">

        {{-- Avatar container --}}
        <div class="relative cursor-pointer" @click="$refs.avatarInput.click()">
            <div class="relative w-42 h-42 rounded-full bg-gradient-to-br from-orange-100 via-orange-50 to-orange-100 border-4 border-orange-200 shadow-xl group-hover:border-orange-400 transition-all duration-300">
                <div class="w-full h-full flex items-center justify-center overflow-hidden rounded-full">
                    @if(isset($avatar_path) && $avatar_path)
                        <img class="w-42 h-42 rounded-full object-cover border-4 border-orange-200 shadow-xl"
                            src="{{ asset('storage/'.$avatar_path) }}" alt="Avatar">
                    @else
                        <x-icon-avatar-demand />
                    @endif
                </div>
            </div>

            {{-- Camera icon --}}
            <label class="absolute bottom-0 right-0 p-3 bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-full shadow-2xl transform hover:scale-110 active:scale-95 transition-all duration-300 border-4 border-white group-hover:shadow-orange-400/50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-5 h-5 text-white" aria-hidden="true">
                    <path d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z"></path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>
            </label>

            {{-- Hidden input --}}
            <input type="file" x-ref="avatarInput" wire:model="avatar" accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden">
        </div>

        {{-- Upload area --}}
        <div class="flex flex-col">
            <div class="relative bg-gradient-to-br from-orange-50 to-white border-2 border-orange-200 rounded-2xl p-5 shadow-inner group-hover:border-orange-300 transition-all">
                <div class="relative z-10">
                    <p class="font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <x-icon-user class="text-orange-500" />
                        Votre avatar
                    </p>
                    @if (session()->has('message'))
                        <span class="text-green-600 font-semibold flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-4 h-4" aria-hidden="true"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>{{ session('message') }}</span>
                    @else
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Ajoutez une photo claire pour donner confiance aux prestataires
                        </p>
                    @endif
                    @if ($errors->has('avatar'))
                        <span class="text-red-600 font-semibold flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle w-4 h-4" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <circle cx="12" cy="16" r="1"></circle>
                            </svg>
                            {{ $errors->first('avatar') }}
                        </span>
                    @endif
                    <p class="text-xs text-gray-500 mt-2">
                        Format JPG, PNG ou WebP • Maximum 5 Mo
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload progress --}}
    <div wire:loading wire:target="avatar" class="text-sm text-gray-500 mt-1">
        Upload en cours...
    </div>
</div>