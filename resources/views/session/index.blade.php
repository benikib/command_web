@extends("layouts.default")
@section("content")
<div class="p-4 sm:p-6 space-y-6">
    <!-- Bouton Retour -->
    <div>
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-neutral-900 border border-neutral-200 rounded-lg transition-all duration-200 shadow-sm group">
            <svg class="w-5 h-5 mr-2 text-neutral-500 group-hover:text-neutral-700 transition-colors"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span class="font-medium">Retour</span>
        </a>
    </div>
    <!-- En-tête avec bouton d'ajout -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-neutral-100">Sessions d'Examens</h1>
        <button type="button"
                class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-300 text-neutral-900 rounded-lg transition-colors"
                data-hs-overlay="#hs-focus-management-modal">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter une session
        </button>
    </div>

    <!-- Modal pour l'ajout -->
    @include('session.create')

    <!-- Modal pour l'édition -->
    <div id="edit-session-modal" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
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
                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit-session-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>

                <form id="editSessionForm" class="p-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_session_id" name="session_id">
                    <div class="space-y-4">
                        <!-- Intitulé -->
                        <div>
                            <label for="edit_intitule" class="block text-sm font-medium text-neutral-900 dark:text-white mb-1.5">
                                Intitulé de la session
                            </label>
                            <input type="text"
                                   name="intitule"
                                   id="edit_intitule"
                                   class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:text-white text-sm"
                                   placeholder="Ex: Session Ordinaire">
                        </div>

                        <!-- ... autres champs du formulaire ... -->

                        <!-- Message de statut -->
                        <div id="statusMessage" class="mt-4 hidden">
                            <p class="text-sm font-medium"></p>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="mt-6 flex justify-end gap-x-3">
                            <button type="button"
                                    class="px-3 py-1.5 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:bg-gray-100 dark:hover:bg-neutral-700 rounded-lg transition-colors"
                                    data-hs-overlay="#edit-session-modal">
                                Annuler
                            </button>
                            <button type="submit"
                                    class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors">
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script pour la gestion du modal d'édition -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour remplir le modal avec les données de la session
        function populateEditModal(sessionId, sessionData) {
            document.getElementById('edit_session_id').value = sessionId;
            document.getElementById('edit_intitule').value = sessionData.intitule;
            // ... remplir les autres champs ...
        }

        // Gestionnaire pour le formulaire d'édition
        document.getElementById('editSessionForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const sessionId = document.getElementById('edit_session_id').value;

            fetch(`/session/${sessionId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Fermer le modal et rafraîchir la page
                    HSOverlay.close(document.querySelector('#edit-session-modal'));
                    window.location.reload();
                } else {
                    // Afficher l'erreur
                    const statusMessage = document.getElementById('statusMessage');
                    statusMessage.classList.remove('hidden');
                    statusMessage.querySelector('p').className = 'text-sm font-medium text-red-500';
                    statusMessage.querySelector('p').textContent = data.message || 'Erreur lors de la mise à jour';
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        });
    });
    </script>

    <!-- Tableau des sessions -->
    <div class="bg-white rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">N°</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Intitulé</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Promotion</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Mention</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Semestre</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Année Académique</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($sessions as $session)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $i++ }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $session->intitule }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $session->promotion }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $session->mention }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $session->semestre }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $session->an_academique }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('session.examen', ['id'=> $session->id]) }}"
                                   class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('session.edit', ['id' => $session->id]) }}"
                                   class="p-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg transition-colors"
                                   data-hs-overlay="#hs-focus-management-modale">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('session.delete', ['id'=> $session->id]) }}"
                                   class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </a>
                                <a href="{{ route('session.horaire.pdf', ['id' => $session->id]) }}"
                                   class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors"
                                   title="Télécharger l'horaire">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-neutral-500">
                            Aucune session trouvée
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
