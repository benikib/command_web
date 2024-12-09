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

    <!-- En-tête avec boutons -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-neutral-100">Gestion des Examens</h1>
        <div class="flex gap-4">
            <!-- Bouton Télécharger -->
            <div class="dropdown relative">
                <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-300 text-neutral-900 rounded-lg transition-colors dropdown-toggle"
                        data-bs-toggle="dropdown">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Télécharger
                </button>
                <ul class="dropdown-menu absolute hidden bg-white mt-2 py-2 rounded-lg shadow-xl dark:bg-neutral-800 min-w-[160px] z-50">
                    <li>
                        <a href="{{ route('examens.download', ['format' => 'pdf']) }}"
                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-neutral-700">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            PDF
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('examens.download', ['format' => 'excel']) }}"
                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-neutral-700">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Excel
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Bouton Ajouter -->
            <button type="button"
                    class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-300 text-neutral-900 rounded-lg transition-colors"
                    data-hs-overlay="#hs-focus-management-modal">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajouter un examen
            </button>
        </div>
    </div>

    <!-- Modal pour l'ajout -->
    @include('examens.create')

    <!-- Tableau des examens -->
    <div class="bg-white rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">N°</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Date</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Cours</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Titulaire du cours</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Heures</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Locaux</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($examens as $examen)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $i++ }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $examen->date }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $examen->intitule }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $examen->professeur }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $examen->heure }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $examen->n_local }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('surveillants', ['id' => $examen->id]) }}"
                                   class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('examens.download.pdf', ['id' => $examen->id]) }}"
                                   class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors"
                                   title="Télécharger en PDF">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </a>
                                <a href="#"
                                   class="p-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('examen.delete', ['id'=> $examen->id]) }}"
                                   class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-neutral-500">
                            Aucun examen trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script pour le dropdown -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Fermer le dropdown quand on clique ailleurs
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });
});
</script>
@endsection
