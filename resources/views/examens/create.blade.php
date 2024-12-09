@extends('layouts.modal')
@section('title')
<div class="flex items-center gap-x-3">
    <div class="p-2 bg-yellow-400/10 rounded-lg">
        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
        </svg>
    </div>
    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">
        Ajouter un Examen
    </h3>
</div>
@endsection

@section('form')
<form action="{{ route('examen_store') }}" method="POST" class="p-6">
    @csrf
    <div class="space-y-6">
        <!-- Intitulé -->
        <div>
            <label for="intitule" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                Intitulé de l'examen
            </label>
            <input type="text"
                   name="intitule"
                   id="intitule"
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white"
                   placeholder="Ex: Mathématiques Fondamentales">
        </div>

        <!-- Professeur -->
        <div>
            <label for="professeur" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                Professeur titulaire
            </label>
            <input type="text"
                   name="professeur"
                   id="professeur"
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white"
                   placeholder="Nom du professeur">
        </div>

        <!-- Informations pratiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="n_local" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                    Nombre de locaux
                </label>
                <input type="number"
                       name="n_local"
                       id="n_local"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white"
                       min="1">
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                    Date de l'examen
                </label>
                <input type="date"
                       name="date"
                       id="date"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white">
            </div>

            <div>
                <label for="heure" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                    Heure de début
                </label>
                <input type="time"
                       name="heure"
                       id="heure"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white">
            </div>
        </div>

        <input type="hidden" name="session_examens_id" value="{{ $session->id }}">
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
            Enregistrer
        </button>
    </div>
</form>
@endsection
