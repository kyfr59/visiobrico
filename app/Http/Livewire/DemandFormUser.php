<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DemandFormUser extends Component
{
    public $email = "kyfr59@gmail.scom";
    public $pseudo;
    public $isGuest = true;
    public $showExtraInfo = false;
    public $desactivateSubmit = true;
    public $currentStep = 2;

    protected $rules = [
        'email' => 'required_if:isGuest,true|email|max:255',
        'pseudo' => 'required_if:showExtraInfo,true|string|min:3|max:50|alpha_dash',
    ];

    protected $messages = [
        'email.required_if' => 'L\'e-mail est requis',
        'email.email' => 'L\'e-mail n\'est pas valide',
        'pseudo.required_if' => 'Le pseudo est requis',
        'pseudo.string' => 'Le pseudo doit être une chaîne de caractères',
        'pseudo.min' => 'Le pseudo doit faire au moins 3 caractères',
        'pseudo.max' => 'Le pseudo ne doit pas dépasser 50 caractères',
        'pseudo.alpha_dash' => 'Le pseudo ne peut contenir que des lettres, chiffres, tirets et underscores',
        'pseudo.unique' => 'Ce pseudo est déjà utilisé',
    ];

    // Ecoute les évènement des composants inclus
    protected $listeners = ['closeModal'];

    // Initialisation du composant
    public function mount()
    {
        $this->validateEmail();

        $this->isGuest = !Auth::check();

        if (!empty($this->email)) {
            $this->validateOnly('email');
        }
    }

    public function validateEmail() {

        $this->showExtraInfo = false;
        $this->desactivateSubmit = true;

        $this->validateOnly('email');

        // Email valide
        $exists = \App\Models\User::where('email', $this->email)->exists();
        $this->showExtraInfo = !$exists;
        $this->desactivateSubmit = false;

    }

    public function validatePseudo() {

        $this->validateOnly('pseudo');

        // Pseudo existe ?
        $exists = \App\Models\User::where('pseudo', $this->pseudo)->exists();
        if ($exists) {
            $this->addError('pseudo', "Ce pseudo existe déjà !");
            return;
        }

    }

    public function render()
    {
        return view('livewire.demand-form-user', [
            'showExtraInfo' => $this->showExtraInfo,
            'desactivateSubmit' => $this->desactivateSubmit
        ]);
    }

    // Demande la fermeture de la popup au parent
    public function requestClose()
    {
        $this->dispatch('closeModal');
    }


    public function submitForm()
    {
        $this->validate();

        // Emet un événement pour prévenir le parent qu'on peut passer à l'étape suivante
        /*
        $this->dispatch('step2', [
            'demand' => [
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'photos' => $this->demand['photos'] ?? [],
            ]
        ]);
        */
    }
}