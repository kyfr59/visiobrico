<div>
    <!-- Bouton pour ouvrir la popup -->
    <a wire:click="openModal" class="py-5 btn-menu flex lg:mt-0 text-gray-700">
        <x-icon-plus class="lg:text-orange-500" />
        Nouvelle demande
    </a>

    <!-- Modale -->
    @if($showModal)
        <!-- Overlay -->
        <div class="border fixed inset-0 bg-black/80 z-40" wire:click="closeModal"></div>

        <!-- Modale content -->
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-2xl h-5/6 w-full max-w-2xl max-h-[90vh] overflow-hidden"
                 @click.stop>

                <!-- En-tête -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">
                                <i class="fas fa-file-alt mr-2"></i> Nouvelle demande
                            </h2>
                            <p class="text-blue-100 mt-1">
                                Remplissez ce formulaire pour créer une nouvelle demande
                            </p>
                        </div>
                        <button wire:click="closeModal"
                                class="text-white hover:text-blue-200 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Messages flash -->
                @if(session()->has('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mx-6 mt-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mx-6 mt-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Formulaire -->
                <form wire:submit.prevent="saveDemand" class="p-6 overflow-y-auto max-h-[60vh]">
                    <!-- Email (seulement pour les invités) -->
                    @if($isGuest)
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-1"></i> Votre email *
                            </label>
                            <input type="email"
                                   wire:model="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                   placeholder="exemple@email.com">
                            @error('email')
                                <span class="text-red-600 text-sm mt-1 block">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </span>
                            @enderror
                            <p class="text-gray-500 text-sm mt-1">
                                Un lien de confirmation vous sera envoyé
                            </p>
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

                    <!-- Titre -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-heading mr-1"></i> Titre de la demande *
                        </label>
                        <input type="text"
                               wire:model="title"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: Fuite sous l'évier de cuisine">
                        @error('title')
                            <span class="text-red-600 text-sm mt-1 block">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Catégorie -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-1"></i> Catégorie *
                        </label>
                        <select wire:model="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">-- Sélectionnez une catégorie --</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-red-600 text-sm mt-1 block">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-1"></i> Description détaillée *
                        </label>
                        <textarea wire:model="description"
                                  rows="5"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                  placeholder="Décrivez votre problème en détail..."></textarea>
                        @error('description')
                            <span class="text-red-600 text-sm mt-1 block">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                        <div class="flex justify-between mt-2">
                            <span class="text-gray-500 text-sm">
                                Minimum 20 caractères
                            </span>
                            <span class="text-sm {{ strlen($description) > 2000 ? 'text-red-600' : 'text-gray-500' }}">
                                {{ strlen($description) }}/2000
                            </span>
                        </div>
                    </div>

                    <!-- Upload photos -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-images mr-1"></i> Photos (optionnel)
                        </label>

                        <!-- Zone de drop -->
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition"
                             wire:click="$refs.photoInput.click()"
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
                            <input type="file"
                                   wire:model="photos"
                                   wire:ref="photoInput"
                                   multiple
                                   accept="image/*"
                                   class="hidden">

                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-600 font-medium">
                                Cliquez ou glissez-déposez vos photos
                            </p>
                            <p class="text-gray-500 text-sm mt-1">
                                JPG, PNG - max 5MB - max 3 photos
                            </p>
                        </div>

                        <!-- Prévisualisation -->
@if(count($photos) > 0)
    <div class="mt-4 grid grid-cols-3 gap-3">
        @foreach($photos as $index => $photo)
            <div class="relative group">
                {{-- Image --}}
                <img src="{{ $photo->temporaryUrl() }}"
                     class="w-full h-32 object-cover rounded-lg border-2 border-gray-100">

                {{-- Gros bouton X --}}
                <button type="button"
                        wire:click="removePhoto({{ $index }})"
                        class="absolute -top-2 -right-2
                               bg-red-500 hover:bg-red-600 text-white
                               rounded-full w-12 h-12 flex items-center justify-center
                               text-2xl font-bold shadow-2xl
                               border-4 border-white z-20"
                        title="Supprimer">
                    ×
                </button>

                {{-- Effet d'ombre pour le rendre 3D --}}
                <div class="absolute -top-2 -right-2 w-12 h-12
                            bg-red-700/30 rounded-full blur-sm"></div>

                {{-- Numéro --}}
                <span class="absolute bottom-2 right-2 bg-gray-900/90 text-white
                            text-xs font-bold px-2.5 py-1.5 rounded">
                    {{ $loop->iteration }}
                </span>
            </div>
        @endforeach
    </div>
@endif
                        @error('photos.*')
                            <span class="text-red-600 text-sm mt-1 block">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-end space-x-3 pt-6 border-gray-100 border-t">
                        <button type="button"
                                wire:click="closeModal"
                                wire:loading.attr="disabled"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Annuler
                        </button>
                        <button type="submit"
                                wire:loading.attr="disabled"
                                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            <span wire:loading.remove>
                                @if($isGuest)
                                    Envoyer le lien
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