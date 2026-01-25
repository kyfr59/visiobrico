<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Demand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class DemandPopup extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $title = '';
    public $description = '';
    public $email = '';
    public $category = '';
    public $photos = [];
    public $isGuest = true;

    // Catégories disponibles
    public $categories = [
        'plomberie' => 'Plomberie',
        'electricite' => 'Électricité',
        'peinture' => 'Peinture',
        'menuiserie' => 'Menuiserie',
        'maconnerie' => 'Maçonnerie',
        'autre' => 'Autre',
    ];

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:20|max:2000',
        'email' => 'required_if:isGuest,true|email|max:255',
        'category' => 'required|in:plomberie,electricite,peinture,menuiserie,maconnerie,autre',
        'photos.*' => 'nullable|image|max:5120', // 5MB max
    ];

    protected $messages = [
        'title.required' => 'Le titre est requis.',
        'title.min' => 'Le titre doit faire au moins 5 caractères.',
        'description.required' => 'La description est requise.',
        'description.min' => 'La description doit faire au moins 20 caractères.',
        'email.required_if' => 'L\'email est requis pour les invités.',
        'email.email' => 'L\'email n\'est pas valide.',
        'category.required' => 'Veuillez sélectionner une catégorie.',
        'photos.*.image' => 'Les fichiers doivent être des images.',
        'photos.*.max' => 'L\'image ne doit pas dépasser 5MB.',
    ];

    public function mount()
    {
        // Vérifier si l'utilisateur est connecté
        $this->isGuest = !Auth::check();

        // Pré-remplir l'email si connecté
        if (!$this->isGuest) {
            $this->email = Auth::user()->email;
        }
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->resetForm();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
        $this->resetErrorBag();
    }

    public function saveDemand()
    {
        $this->validate();

        try {
            // Trouver ou créer l'utilisateur
            if ($this->isGuest) {
                $user = User::firstOrCreate(
                    ['email' => $this->email],
                    [
                        'name' => 'Invité',
                        'password' => bcrypt(uniqid()),
                    ]
                );
            } else {
                $user = Auth::user();
            }

            // Préparer les données de la demande
            $demandData = [
                'title' => $this->title,
                'description' => $this->description,
                'user_id' => $user->id,
                'status' => 'pending',
                'category' => $this->category,
            ];

            // Gérer l'upload des photos
            $photoPaths = [];
            foreach ($this->photos as $index => $photo) {
                if ($index < 3) { // Max 3 photos
                    $path = $photo->store('demands/photos', 'public');
                    $photoPaths['photo' . ($index + 1)] = $path;
                }
            }

            // Fusionner les chemins des photos
            $demandData = array_merge($demandData, $photoPaths);

            // Créer la demande
            $demand = Demand::create($demandData);

            // Émettre un événement pour les notifications
            $this->dispatch('demand-created', demandId: $demand->id);

            // Message de succès
            session()->flash('success', 'Demande créée avec succès !');

            // Fermer la modale après 1.5 secondes
            $this->dispatch('close-modal-delayed');

        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function removePhoto($index)
    {
        if (isset($this->photos[$index])) {
            unset($this->photos[$index]);
            $this->photos = array_values($this->photos); // Réindexer
        }
    }

    private function resetForm()
    {
        $this->reset(['title', 'description', 'email', 'category', 'photos']);

        if (!$this->isGuest) {
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('livewire.demand-popup');
    }
}