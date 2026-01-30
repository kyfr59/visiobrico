<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\ModerationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DemandFormDemand extends Component
{
    use WithFileUploads;

    public $title = "";
    public $description = "";
    public $category = "";
    public $demand = [];
    public $photos = [];
    public $isGuest = true;
    public $currentStep = 1;

    // Catégories disponibles
    public $categories = [
        'plomberie' => 'Plomberie',
        'electricite' => 'Électricité',
        'peinture' => 'Peinture',
        'menuiserie' => 'Menuiserie',
        'maconnerie' => 'Maçonnerie',
        'autre' => 'Autre',
    ];

    // Règles de validation
    protected $rules = [
        'title' => 'required|min:10|max:255',
        'description' => 'required|min:20|max:2000',
        'category' => 'required|in:plomberie,electricite,peinture,menuiserie,maconnerie,autre',
        'photos.*' => 'nullable|image|max:120', // 5MB max
    ];

    // Messages d'erreur
    protected $messages = [
        'title.required' => 'Le titre est requis',
        'title.min' => 'Le titre doit faire au moins 5 caractères',
        'description.required' => 'La description est requise',
        'description.min' => 'La description doit faire au moins 20 caractères',
        'category.required' => 'La catégorie est requise',
        'photos.max' => 'Vous pouvez ajouter au maximum 3 photos',
        'photos.*.image' => 'Les fichiers doivent être des images',
        'photos.*.max' => 'L\'image ne doit pas dépasser 5MB',
        'photos.*.uploaded' => 'La photo :index n’a pas pu être téléchargée',
    ];

    // Ecoute les évènement des composants inclus
    protected $listeners = ['closeModal'];

    // Initialisation du composant
    public function mount($demand)
    {
        if ($demand) {
            $this->title = $demand['title'];
            $this->description = $demand['description'];
            $this->category = $demand['category'];
            // $this->photos = $demand['category'];
        }
        $this->isGuest = !Auth::check();
    }

    public function render()
    {
        return view('livewire.demand-form-demand');
    }

    // Valide les photos et les stocke sur le serveur
    public function updatedPhotos()
    {
        $this->resetErrorBag('photos');

        try {
            $this->validateOnly('photos.*');
        } catch (\Illuminate\Validation\ValidationException $e) {
            array_pop($this->photos);
            throw $e;
        }

        foreach ($this->photos as $photo) {
            $path = $photo->store('demand_photos', 'public');
            $this->demand['photos'][] = $path;
        }

        $this->photos = [];
    }

    public function removePhoto($index)
    {
        if (!isset($this->demand['photos'][$index])) {
            return;
        }

        Storage::disk('public')->delete($this->demand['photos'][$index]);

        unset($this->demand['photos'][$index]);
        $this->demand['photos'] = array_values($this->demand['photos']);
    }

    // Mises à jour individuelle des champs (appelée au blur depuis blade)
    public function validateTitle() { $this->validateOnly('title'); }
    public function validateDescription() { $this->validateOnly('description'); }
    public function validateCategory() { $this->validateOnly('category'); }

    // Demande la fermeture de la popup au parent
    public function requestClose()
    {
        $this->dispatch('closeModal');
    }

    public function submitForm()
    {
        $this->validate();

        if (config('openai.enable_moderation')) {
            $moderation = app(\App\Services\ModerationService::class);
            $result = $moderation->checkText($this->description);
            if (!$result['allowed']) {
                $this->addError('description', $result['reason']);
                return;
            }
        }

        // Emet un événement pour prévenir le parent qu'on peut passer à l'étape suivante
        $this->dispatch('step2', [
            'demand' => [
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'photos' => $this->demand['photos'] ?? [],
            ]
        ]);
    }
}