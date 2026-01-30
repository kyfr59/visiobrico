<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DemandFormUser extends Component
{
    public $email = "kyfr59@gmail.scom";
    public $isGuest = true;
    public $showExtraInfo = false;
    public $desactivateSubmit = true;
    public $currentStep = 2;

    protected $rules = [
        'email' => 'required_if:isGuest,true|email|max:255',
    ];

    protected $messages = [
        'email.required_if' => 'L\'e-mail est requis',
        'email.email' => 'L\'e-mail n\'est pas valide',
    ];

    // Ecoute les évènement des composants inclus
    protected $listeners = ['closeModal'];

    public function validateEmail() {

        $this->showExtraInfo = false;
        $this->desactivateSubmit = true;

        $this->validateOnly('email');

        // Email valide
        $exists = \App\Models\User::where('email', $this->email)->exists();
        $this->showExtraInfo = !$exists;
        $this->desactivateSubmit = false;

    }

    // Initialisation du composant
    public function mount()
    {
        $this->validateEmail();

        $this->isGuest = !Auth::check();

        if (!empty($this->email)) {
            $this->validateOnly('email');
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