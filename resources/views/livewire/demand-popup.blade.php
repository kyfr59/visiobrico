<div>
    {{-- Bouton pour ouvrir la modale --}}
    <a wire:click="openModal" class="py-2 lg:py-5 btn-menu flex mt-4 lg:mt-0 text-gray-700">
        <x-icon-plus class="lg:text-orange-500" />
        Nouvelle demande
    </a>

    {{-- Modale --}}
    @if($showModal)
        {{-- Overlay --}}
        <div class="border fixed inset-0 bg-black/80 z-40 cursor-pointer"
            wire:click="closeModal"
        ></div>

        {{-- Contenu de la modale --}}
        <div class="fixed inset-0 z-40 flex items-center justify-center p-4 pointer-events-none">

                @if (session()->has('success'))

                    <div class="pointer-events-auto border bg-white rounded-xl lg:rounded-3xl shadow-2xl w-full lg:max-w-3xl max-w-2xl max-h-[100vh] lg:h-full">
                        <button class="absolute top-4 right-4 z-20 p-2 hover:bg-gray-100 rounded-xl transition-all duration-300 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5" aria-hidden="true">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>

                        <div class="relative pt-12 pb-8 rounded-xl lg:rounded-3xl bg-gradient-to-br from-orange-50 via-white to-orange-50 overflow-hidden">
                            <div class="absolute top-5 left-1/4 w-32 h-32 bg-orange-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
                            <div class="absolute bottom-0 right-1/4 w-40 h-40 bg-orange-300 rounded-full blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>

                            <div class="relative flex flex-col items-center">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-green-400 rounded-full animate-ping opacity-20"></div>
                                    <div class="absolute inset-0 bg-green-400 rounded-full animate-pulse opacity-10 scale-150"></div>
                                    <div class="relative p-5 bg-gradient-to-br from-green-400 to-green-500 rounded-full shadow-2xl shadow-green-400/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-16 h-16 text-white" aria-hidden="true">
                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                            <path d="m9 11 3 3L22 4"></path>
                                        </svg>
                                    </div>
                                </div>

                                <h2 class="mt-6 text-3xl font-bold text-gray-900 text-center">Demande publiée !</h2>
                                <p class="mt-3 text-gray-600 text-center px-6">Votre demande a été créée avec succès !</p>
                            </div>
                        </div>

                        <div class="px-6 py-8 space-y-4">
                            <h3 class="flex items-center gap-2 text-lg font-bold text-gray-900 mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles w-5 h-5 text-orange-500" aria-hidden="true">
                                    <path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
                                    <path d="M20 2v4"></path>
                                    <path d="M22 4h-4"></path>
                                    <circle cx="4" cy="20" r="2"></circle>
                                </svg>
                                Et maintenant ?
                            </h3>

                            <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl border-2 border-orange-100 group hover:border-orange-300 transition-all">
                                <div class="p-2 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 text-white" aria-hidden="true">
                                        <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                        <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1">Vous serez notifié</p>
                                    <p class="text-sm text-gray-700">Recevez une alerte pour chaque proposition de prestataire</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl border-2 border-orange-100 group hover:border-orange-300 transition-all">
                                <div class="p-2 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-5 h-5 text-white" aria-hidden="true">
                                        <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1">Comparez les offres</p>
                                    <p class="text-sm text-gray-700">Échangez avec les prestataires et choisissez la meilleure offre</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl border-2 border-orange-100 group hover:border-orange-300 transition-all">
                                <div class="p-2 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5 text-white" aria-hidden="true">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1">Confiez votre projet</p>
                                    <p class="text-sm text-gray-700">Sélectionnez le prestataire idéal et lancez vos travaux</p>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <div class="relative overflow-hidden bg-gradient-to-r from-orange-500 via-orange-600 to-orange-500 rounded-2xl p-5 shadow-lg">
                                <div class="relative z-10 text-center">
                                    <p class="text-white font-bold text-lg italic">Pensez Visio pour vos travaux ! 🔧</p>
                                </div>
                                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,...')] opacity-30"></div>
                                <div class="absolute top-0 right-0 w-24 h-24 bg-white rounded-full blur-3xl opacity-10"></div>
                            </div>
                        </div>

                        <div class="px-6 pb-6">
                            <button class="w-full group relative overflow-hidden px-8 py-4 bg-gradient-to-r from-orange-500 via-orange-600 to-orange-500 text-white font-bold rounded-xl shadow-xl shadow-orange-300/50 hover:shadow-2xl hover:shadow-orange-400/60 transition-all text-lg hover:scale-[1.02]">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-5 h-5" aria-hidden="true">
                                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                        <path d="m9 11 3 3L22 4"></path>
                                    </svg>
                                    J'ai compris
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            </button>
                        </div>
                    </div>

                @else

                    <div class="pointer-events-auto bg-white rounded-xl lg:rounded-3xl shadow-2xl w-full lg:max-w-3xl max-w-2xl max-h-[100vh] lg:h-full overflow-auto p-0" @click.stop>

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
                                <button tabindex="-1" class="hover:bg-gray-200 cursor-pointer p-0.5 rounded-xl transition-all duration-300 text-gray-500 hover:text-gray-700" wire:click="closeModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-6 h-6" aria-hidden="true">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <!-- Formulaire -->
                        <form wire:submit.prevent="saveDemand" class="p-6 bg-gray-50 overflow-y-auto max-h-[60vh] lg:max-h-[77vh]">

                            <!-- Email (seulement pour les non connectés) -->
                            @if($isGuest)
                                <div class="mb-6">
                                    <label class="form-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        Votre e-mail <span class="text-orange-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                            type="email"
                                            require
                                            wire:model.lazy="email"
                                            tabindex="0"
                                            class="form-input @error('email') form-input-error @elseif (!empty($email)) form-input-valid @enderror"
                                            placeholder="exemple@email.com"
                                        />
                                        @error('email')
                                            <x-icon-field-invalid />
                                        @elseif (!empty($email))
                                            <x-icon-field-valid />
                                        @endif
                                       </div>
                                    @error('email')
                                        <span class="form-error">
                                            <x-icon-warning />
                                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            @else
                                <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                                    <p class="text-blue-800">
                                        <i class="fas fa-user-check mr-2"></i>
                                        Connecté en tant que <strong>{{ auth()->user()->name }}</strong>
                                        <br>
                                        <small class="text-blue-600">{{ auth()->user()->email }}</small>
                                    </p>
                                </div>
                            @endif

                            {{-- Titre --}}
                            <div class="mb-6">
                                <label class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Titre de la demande <span class="text-orange-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text"
                                        required
                                        wire:model.lazy="title"
                                        class="form-input @error('title') form-input-error @elseif (!empty($title)) form-input-valid @enderror"
                                        placeholder="Ex : Fuite sous l'évier de cuisine"
                                    />
                                    @error('title')
                                        <x-icon-field-invalid />
                                    @elseif (!empty($title))
                                        <x-icon-field-valid />
                                    @endif
                                </div>
                                @error('title')
                                    <span class="form-error">
                                        <x-icon-warning />
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="group">
                                <label class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                    Description détaillée <span class="text-orange-500">*</span>
                                </label>
                                <div class="relative">
                                    <textarea wire:model="description"
                                            rows="5"
                                            required
                                            class="form-input @error('description') form-input-error @elseif (!empty($description)) form-input-valid @enderror"
                                            placeholder="Décrivez votre problème en détail..."></textarea>
                                    @error('description')
                                        <x-icon-field-invalid class="top-[30px] " />
                                    @elseif (!empty($description))
                                        <x-icon-field-valid class="top-[30px] " />
                                    @endif
                                </div>
                                @error('description')
                                    <span class="form-error">
                                        <x-icon-warning />
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            {{-- Catégorie --}}
                            <div class="group">
                                <label class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>
                                    Catégorie *
                                </label>

                                <div class="relative">
                                    <select wire:model.lazy="category" required
                                        class="form-input appearance-none cursor-pointer @error('category') form-input-error @elseif (!empty($category)) form-input-valid @enderror"
                                    >
                                        <option value="">-- Choisir une catégorie --</option>
                                        @foreach ($categories as $key => $label)
                                            <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <x-icon-field-invalid class="right-12" />
                                    @elseif (!empty($category))
                                        <x-icon-field-valid class="right-12" />
                                    @endif
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('category')
                                    <span class="form-error">
                                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            {{-- Ville (autocomplétion) --}}
                            <div class="mb-6"
                                wire:listen.city-selected="updateCity($event.detail.city)">
                                <livewire:city-autocomplete help-text="A titre indicatif" />
                            </div>

                            {{-- Photos --}}
                            <div class="group">
                                <label class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                    </svg>
                                    Photos
                                </label>
                                <label for="image-upload" class="z-2 group/upload relative flex flex-col items-center justify-center w-full h-40 border-3 border-dashed border-gray-300 rounded-2xl hover:border-orange-500 hover:bg-gradient-to-br hover:from-orange-50 hover:to-orange-100 transition-all cursor-pointer overflow-hidden">
                                    <div class="relative flex flex-col items-center"
                                        @dragover.prevent="$event.target.classList.add('border-blue-400', 'bg-blue-50')"
                                        @dragleave.prevent="$event.target.classList.remove('border-blue-400', 'bg-blue-50')"
                                        @drop.prevent="
                                            $event.target.classList.remove('border-blue-400', 'bg-blue-50');
                                            const files = Array.from($event.dataTransfer.files);
                                            if (files.length + {{ count($photos) }} <= 3) {
                                                @this.uploadMultiple('photos', files);
                                            } else {
                                                alert('Maximum 3 photos autorisées');
                                            }
                                    ">
                                        <div class="p-4 bg-orange-100 group-hover/upload:bg-orange-500 rounded-2xl mb-3 transition-all group-hover/upload:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-8 h-8 text-orange-600 group-hover/upload:text-white transition-colors" aria-hidden="true">
                                                <path d="M12 3v12"></path>
                                                <path d="m17 8-5-5-5 5"></path>
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-bold text-gray-700 group-hover/upload:text-orange-600 transition-colors">
                                            Cliquez pour télécharger
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            PNG, JPG, WebP (max 5 MB) • 0/3 images
                                        </p>
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-400/0 via-orange-400/10 to-orange-400/0 -translate-x-full group-hover/upload:translate-x-full transition-transform duration-1000"></div>
                                        <input type="file"
                                        id="image-upload"
                                        wire:model="photos"
                                        wire:ref="photoInput"
                                        multiple
                                        accept="image/*"
                                        class="hidden" {{ count($photos) >= 3 ? 'disabled' : '' }}>
                                </label>


                                {{-- Photos --}}
                                @if(count($photos) > 0)
                                    <div class="mt-4 grid grid-cols-3 gap-3">
                                        @foreach($photos as $index => $photo)
                                            <div class="relative group/image animate-in zoom-in duration-300">
                                                {{-- Image --}}
                                                <img src="{{ $photo->temporaryUrl() }}"
                                                    class="aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 border-3 border-gray-300  transition-all shadow-lg">
                                                {{-- Bouton supprimer --}}
                                                <button type="button"
                                                        wire:click="removePhoto({{ $index }})"
                                                        class="absolute -top-2 -right-2
                                                            bg-orange-500 hover:bg-orange-700 text-white cursor-pointer
                                                            rounded-full w-12 h-12 flex items-center justify-center
                                                            text-2xl font-bold shadow-2xl
                                                            border-4 border-white z-2"
                                                        title="Supprimer cette photo">
                                                    ×
                                                </button>
                                                {{-- Ombre --}}
                                                <div class="absolute -top-2 -right-2 w-12 h-12 bg-red-700/30 rounded-full blur-sm"></div>
                                                {{-- Numéro de la photo --}}
                                                <span class="absolute bottom-2 right-2 bg-gray-900/90 text-white text-xs font-bold px-2.5 py-1.5 rounded">
                                                    {{ $loop->iteration }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

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
                            <div class="flex justify-end space-x-3 pt-6 border-gray-100 border-t mt-10">
                                <button type="button"
                                        wire:click="closeModal"
                                        wire:loading.attr="disabled"
                                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                    Annuler
                                </button>
                                <button type="submit"
                wire:loading.attr="disabled"
                @click="$el.closest('form').querySelectorAll('input,textarea,select').forEach(el => el.blur())"
                class="cursor-pointer bg-gradient-to-r from-orange-500 to-orange-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-orange-600 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl">
            <i class="fas fa-paper-plane mr-2"></i>
            <span wire:loading.remove>
                @if($isGuest)
                    Publier ma demande
                @else
                    Créer la demande
                @endif
            </span>
            <span wire:loading>
                <i class="fas fa-spinner fa-spin mr-2"></i> Traitement...
            </span>
        </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    @endif

    <!-- Script pour fermer la modale après succès -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('close-modal-delayed', () => {
                setTimeout(() => {
                    @this.closeModal();
                }, 1500);
            });

            Livewire.on('demand-created', (event) => {
                // Vous pouvez déclencher d'autres actions ici
                console.log('Demande créée avec ID:', event.demandId);

                // Rafraîchir une liste de demandes si elle existe
                Livewire.dispatch('refresh-demands-list');
            });
        });
    </script>
</div>