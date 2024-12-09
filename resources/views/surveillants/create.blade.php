@extends('layouts.modal')
@section('title')
<div class="flex items-center gap-x-3">
    <div class="p-2 bg-yellow-400/10 rounded-lg">
        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>
    </div>
    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">
        Ajouter un Surveillant
    </h3>
</div>
@endsection

@section('form')
<form action="{{ route('surveillant_store') }}" method="POST" class="p-6">
    @csrf
    <div class="space-y-6">
        <!-- Sélection du surveillant -->
        <div>
            <label for="user_id" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                Sélectionner un surveillant
            </label>
            <select name="user_id"
                    id="user_id"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white">
                <option value="">Choisir un surveillant</option>
                @foreach($users_dispo as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- ID de l'examen (hidden) -->
        <input type="hidden" name="examen_id" value="{{ $examen->id }}">

        <!-- Informations de l'examen (lecture seule) -->
        <div class="bg-gray-50 dark:bg-neutral-800/50 rounded-lg p-4 space-y-3">
            <div>
                <label class="block text-xs font-medium text-neutral-500 dark:text-neutral-400">
                    Examen
                </label>
                <p class="text-sm text-neutral-900 dark:text-white">{{ $examen->intitule }}</p>
            </div>
            <div>
                <label class="block text-xs font-medium text-neutral-500 dark:text-neutral-400">
                    Date et Heure
                </label>
                <p class="text-sm text-neutral-900 dark:text-white">
                    {{ $examen->date }} à {{ $examen->heure }}
                </p>
            </div>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="mt-8 flex justify-end gap-x-3">
        <button type="button"
                class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:bg-gray-100 dark:hover:bg-neutral-700 rounded-lg transition-colors"
                data-hs-overlay="#hs-focus-management-modal">
            Annuler
        </button>
        <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors">
            Ajouter
        </button>
    </div>
</form>
@endsection
