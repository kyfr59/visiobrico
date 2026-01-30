<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $avatar = null;
    public $avatar_path;
    public $user;

    protected $rules = [
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
    ];

    // Messages d'erreur
    protected $messages = [
        'avatar.image' => 'Le fichier doit être une image',
        'avatar.mimes' => 'Le format de l\'image doit être jpeg, png, jpg, gif ou webp',
        'avatar.max' => 'L\'image ne doit pas dépasser 2MB',
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    // Valide les photos et les stocke sur le serveur
    public function updatedAvatar()
    {
        $this->resetErrorBag('avatar');

        $this->validate();

        $this->avatar_path = $this->avatar->store('avatars', 'public');

        session()->flash('message', 'Avatar mis à jour avec succès !');
    }

    public function render()
    {
        return view('livewire.avatar-upload');
    }
}
