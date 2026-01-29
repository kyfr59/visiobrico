<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DemandFormConfirmation extends Component
{
    public $demand = [];
    public $user = [];

    public function render()
    {
        return view('livewire.demand-form-confirmation');
    }
}