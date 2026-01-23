@extends('layouts.app')

@section('content')
    <div class="text-xl">Nouvelle demande</div>
    <form method="POST" action="{{ route('public.demand.add') }}">
        @csrf

        {{-- Email --}}
        @guest
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
        @else
            <input
                type="hidden"
                name="email"
                required
                value="{{ auth()->user()->email }}"
            >
        @endif

        {{-- Description de la demande --}}
        <label class="block mb-2 text-sm font-medium">
            Votre demande
        </label>
        <textarea
            name="description"
            required
            placeholder="Décrivez votre demande ici..."
            class="w-full border rounded px-3 py-2 mb-4"
            rows="5"
        ></textarea>

        <button
            type="submit"
            class="w-full bg-orange-600 text-white py-2 rounded hover:bg-orange-700"
        >Valider</button>
    </form>
@endsection
