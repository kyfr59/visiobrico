<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CityAutocomplete extends Component
{
    public $query = '';
    public $selectedCity = '';
    public $showDropdown = false;
    public $cities = [];
    public $helpText = '';

    protected $rules = [
        'selectedCity' => 'string',
    ];

    public function mount(string $helpText = '')
    {
        // Set defaut value
        /*
        $response = Http::get('https://geo.api.gouv.fr/communes', [
            'code' => 44184,
            'limit' => 1,
            'fields' => 'nom,code,codesPostaux,codeDepartement,departement,region'
        ]);

        $city = $response->json()[0] ?? null;

        if ($city) {
            $this->selectedCity = $city;
            $this->query = $city['nom'];
        }
            */

        $this->helpText = $helpText;
    }


    public function updatedQuery()
    {
        if (strlen($this->query) >= 2) {
            $response = Http::get("https://geo.api.gouv.fr/communes", [
                'nom' => $this->query,
                'limit' => 10,
                'boost' => 'population',
                'fields' => 'nom,code,codesPostaux,codeDepartement,departement,region'
            ]);
            $this->cities = $response->json();
            $this->showDropdown = true;
        } else {
            $this->cities = [];
            $this->showDropdown = false;
        }
    }

     public function selectCity($city)
{
    $this->selectedCity = $city;
    $this->query = $city;
    $this->showDropdown = false;
    $this->cities = [];

    $this->validateOnly('selectedCity');
    $this->dispatch('city-selected', city: $city);
}

    public function clearSearch()
    {
        $this->query = '';
        $this->selectedCity = '';
        $this->showDropdown = false;
        $this->cities = [];
    }

    public function render()
    {
        return view('livewire.city-autocomplete');
    }
}