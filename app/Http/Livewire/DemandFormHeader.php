<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DemandFormHeader extends Component
{
    public function render()
    {
        return view('livewire.demand-form-header');
    }

    public function requestClose()
    {
        $this->dispatch('closeModal');
    }
}