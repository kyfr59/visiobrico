<form wire:submit.prevent="submitForm" class="p-6 bg-gray-50 overflow-y-auto max-h-[100vh] lg:max-h-[80vh]">

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
                x-on:input="
                    if ($el.value.trim() === '') {
                        $el.blur()
                    }
                "
                wire:model.defer="title"
                class="form-input @error('title') form-input-error @elseif (!empty($title)) form-input-valid @enderror"
                placeholder="Ex : Fuite sous l'évier de cuisine"
                wire:blur="validateTitle"
            />
            @error('title')
                <x-icon-field-invalid />
            @elseif (!empty($title))
                <x-icon-field-valid />
            @endif
        </div>
        @error('title')
            <span class="form-error">
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
            <textarea wire:model.defer="description"
                    wire:blur="validateDescription"
                    rows="5"
                    x-on:input="
                        if ($el.value.trim() === '') {
                            $el.blur()
                        }
                    "
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
            <select
                wire:model.defer="category"
                @change="$el.blur()"
                required
                wire:blur="validateCategory"
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
        @if(!empty($demand['photos']))
            <div class="mt-4 grid grid-cols-3 gap-3">
                @foreach($demand['photos'] as $index => $path)
                    <div class="relative group/image animate-in zoom-in duration-300">
                        {{-- Image --}}
                        <img src="{{ Storage::url($path) }}"
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

        {{-- Conseil de l'équipe --}}
        <div class="mt-4 relative overflow-hidden bg-gradient-to-r from-orange-50 via-orange-100 to-orange-50 border-2 border-orange-200 rounded-2xl p-5 shadow-inner">
            <div class="relative z-10 flex items-start gap-4">
                <div class="p-2 bg-orange-500 rounded-xl flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        class="w-5 h-5 text-white" aria-hidden="true">
                        <!-- Icône info -->
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 2a10 10 0 110 20 10 10 0 010-20z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-orange-900 mb-1">Le conseil de l'équipe VisioBrico</p>
                    <p class="text-sm text-orange-800">
                        Plus votre demande est détaillée avec des photos, plus vous recevrez de propositions pertinentes et compétitives de la part des prestataires qualifiés.
                    </p>
                </div>
            </div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-orange-300 rounded-full blur-3xl opacity-20"></div>
        </div>


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
    <livewire:demand-form-buttons :isGuest="$isGuest" :currentStep="$currentStep" />

</form>