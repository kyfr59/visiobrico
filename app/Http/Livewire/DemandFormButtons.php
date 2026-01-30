<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DemandFormButtons extends Component
{
    public $user = [];
    public $currentStep;

    public function render()
    {
        return view('livewire.demand-form-buttons');
    }

    public function requestClose()
    {
        $this->dispatch('closeModal');
    }
}