@extends('layouts.modal')
@section('title')
<div class="flex items-center gap-x-3">
    <div class="p-2 bg-yellow-400/10 rounded-lg">
        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
    </div>
    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">
        Ajouter une Session
    </h3>
</div>
@endsection

@section('form')
<form action="{{ route('repporting.store') }}" method="POST" class="p-4">
    @csrf
    <div class="space-y-4">
        <!-- Mention -->
        <div>
            <label for="mention" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Mention
            </label>
            <input type="text"
                   name="mention"
                   id="mention"
                   class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm"
                   placeholder="Ex: Informatique">
        </div>

        <!-- Promotion -->
        <div>
            <label for="promotion" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Promotion
            </label>
            <div class="relative">
                <select id="promotion"
                        name="promotion"
                        class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white appearance-none text-sm"
                        onchange="updateSemesters()">
                    <option value="" selected disabled>Sélectionnez une promotion</option>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                    <option value="M1">M1</option>
                    <option value="M2">M2</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 dark:text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Intitulé de la session -->
        <div>
            <label for="intitule" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Intitulé de la session
            </label>
            <select name="intitule"
                    id="intitule"
                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm">
                <option value="" selected disabled>Sélectionnez un intitulé</option>
                <option value="Session Ordinaire">Session Ordinaire</option>
                <option value="Session Spéciale">Session Spéciale</option>
                <option value="Session de Rattrapage">Session de Rattrapage</option>
            </select>
        </div>

        <!-- Semestre -->
        <div>
            <label for="semestre" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Semestre
            </label>
            <select name="semestre"
                    id="semestre"
                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm">
                <option value="" selected disabled>Sélectionnez un semestre</option>
            </select>
        </div>

        <!-- Année académique -->
        <div>
            <label for="an_academique" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Année académique
            </label>
            <select name="an_academique"
                    id="an_academique"
                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm">
                @for ($year = now()->year; $year <= now()->year + 10; $year++)
                    <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="mt-6 flex justify-end gap-x-3">
        <button type="button"
                class="px-3 py-1.5 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:bg-gray-100 dark:hover:bg-neutral-700 rounded-lg transition-colors"
                data-hs-overlay="#hs-focus-management-modal">
            Annuler
        </button>
        <button type="submit"
                class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors">
            Enregistrer
        </button>
    </div>
</form>

<script>
function updateSemesters() {
    const promotion = document.getElementById('promotion').value;
    const semestreSelect = document.getElementById('semestre');
    semestreSelect.innerHTML = '<option value="" selected disabled>Sélectionnez un semestre</option>'; // Reset options

    let semesters = [];
    switch (promotion) {
        case 'L1':
            semesters = ['S1', 'S2'];
            break;
        case 'L2':
            semesters = ['S3', 'S4'];
            break;
        case 'L3':
            semesters = ['S5', 'S6'];
            break;
        case 'M1':
            semesters = ['S7', 'S8'];
            break;
        case 'M2':
            semesters = ['S9', 'S10'];
            break;
    }

    semesters.forEach(sem => {
        const option = document.createElement('option');
        option.value = sem;
        option.textContent = sem;
        semestreSelect.appendChild(option);
    });
}
</script>
@endsection
