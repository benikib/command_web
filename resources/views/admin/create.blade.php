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
        Ajouter un Administrateur
    </h3>
</div>
@endsection

@section('form')
<form action="{{ route('admin_store') }}" method="POST" class="p-6">
    @csrf
    <div class="space-y-6">
        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                Adresse email
            </label>
            <div class="relative">
                <input type="email"
                       name="email"
                       id="email"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white"
                       placeholder="exemple@email.com">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 dark:text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </div>
            </div>
            <p class="mt-2 text-sm text-gray-500 dark:text-neutral-400">
                L'utilisateur recevra une invitation par email
            </p>
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
