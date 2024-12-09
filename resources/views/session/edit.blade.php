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
        Modifier la Session
    </h3>
</div>
@endsection

@section('form')
<form id="editSessionForm" class="p-4">
    @csrf
    @method('PUT')
    <div class="space-y-4">
        <!-- Intitulé -->
        <div>
            <label for="intitule" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Intitulé de la session
            </label>
            <input type="text"
                   name="intitule"
                   id="intitule"
                   value="{{ $session->intitule }}"
                   class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm"
                   placeholder="Ex: Session Ordinaire">
        </div>

        <!-- Promotion -->
        <div>
            <label for="promotion" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Promotion
            </label>
            <div class="relative">
                <select id="promotion"
                        name="promotion"
                        class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white appearance-none text-sm">
                    <option value="" disabled>Sélectionnez une promotion</option>
                    @foreach(['L1', 'L2', 'L3', 'M1', 'M2'] as $promo)
                        <option value="{{ $promo }}" {{ $session->promotion === $promo ? 'selected' : '' }}>
                            {{ $promo }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 dark:text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Mention -->
        <div>
            <label for="mention" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Mention
            </label>
            <input type="text"
                   name="mention"
                   id="mention"
                   value="{{ $session->mention }}"
                   class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm"
                   placeholder="Ex: Informatique">
        </div>

        <!-- Semestre -->
        <div>
            <label for="semestre" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                Semestre
            </label>
            <input type="text"
                   name="semestre"
                   id="semestre"
                   value="{{ $session->semestre }}"
                   class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm"
                   placeholder="Ex: S1">
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
                    @php $academic_year = $year . '-' . ($year + 1) @endphp
                    <option value="{{ $academic_year }}" {{ $session->an_academique === $academic_year ? 'selected' : '' }}>
                        {{ $academic_year }}
                    </option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Message de statut -->
    <div id="statusMessage" class="mt-4 hidden">
        <p class="text-sm font-medium"></p>
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
            Mettre à jour
        </button>
    </div>
</form>

<script>
document.getElementById('editSessionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const sessionId = {{ $session->id }};
    const statusMessage = document.getElementById('statusMessage');

    // Afficher un indicateur de chargement
    form.querySelector('button[type="submit"]').disabled = true;

    fetch(`/session/${sessionId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        statusMessage.classList.remove('hidden');

        if (data.success) {
            statusMessage.querySelector('p').className = 'text-sm font-medium text-green-500';
            statusMessage.querySelector('p').textContent = 'Session mise à jour avec succès';

            // Mettre à jour le tableau des sessions
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            statusMessage.querySelector('p').className = 'text-sm font-medium text-red-500';
            statusMessage.querySelector('p').textContent = data.message || 'Erreur lors de la mise à jour';
        }
    })
    .catch(error => {
        statusMessage.classList.remove('hidden');
        statusMessage.querySelector('p').className = 'text-sm font-medium text-red-500';
        statusMessage.querySelector('p').textContent = 'Erreur lors de la mise à jour';
    })
    .finally(() => {
        form.querySelector('button[type="submit"]').disabled = false;
    });
});
</script>
@endsection

