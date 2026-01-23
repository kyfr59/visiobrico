@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h1 class="text-xl font-semibold mb-4">
            Connexion
        </h1>

        {{-- Message succès --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Erreurs --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('connexion.sendlink') }}">
            @csrf

            <label class="block mb-2 text-sm font-medium">
                Adresse email
            </label>

            <input
                type="email"
                name="email"
                required
                autofocus
                placeholder="ex: jean@email.fr"
                class="w-full border rounded px-3 py-2 mb-4"
            >

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700"
            >
                Recevoir un lien de connexion
            </button>
        </form>

        <p class="text-sm text-gray-500 mt-4">
            Un lien de connexion sécurisé vous sera envoyé par email.
        </p>
    </div>
@endsection
