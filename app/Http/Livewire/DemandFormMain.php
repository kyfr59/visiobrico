<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DemandFormMain extends Component
{
    public $currentStep = 1;

    // Stockage global des données
    public $demand = [];
    public $user = [];
    public $message;

    public $successMessage = '';

    public $isOpen = true;

    protected $listeners = ['closeModal', 'step2', 'step1'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.demand-form-main');
    }

    public function increaseStep()
    {
        $this->currentStep++;
    }

    public function decreaseStep()
    {
        $this->currentStep--;
    }

    public function submitForm()
    {
        // Ici tu peux valider globalement et sauvegarder
        $this->validate([
            'demand.title' => 'required|min:3',
            'demand.description' => 'required|min:10',
            'user.name' => 'required|min:3',
            'user.email' => 'required|email',
        ]);

        dd("SubmitForm");
        // Enregistrement exemple
        // Demand::create([...]);

        $this->successMessage = 'Votre demande a été envoyée avec succès !';
        $this->reset(['demand', 'user', 'currentStep']);
        $this->currentStep = 1;
    }

    // Passage à l'étape 2
    public function step2($data)
    {
        // On met à jour les données globales
        $this->demand = $data['demand'] ?? [];

        $this->message=$data['demand']['title'];
        // On passe à l'étape suivante
        $this->currentStep = 2;
    }

    // Retour sur l'étape 1
    public function step1()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }
}

