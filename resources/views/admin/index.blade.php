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
        <h1 class="text-2xl font-bold text-neutral-100">Gestion des Administrateurs</h1>
        <button type="button"
                class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-300 text-neutral-900 rounded-lg transition-colors"
                data-hs-overlay="#hs-focus-management-modal">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter un administrateur
        </button>
    </div>

    <!-- Modal pour l'ajout -->
    @include('admin.create')

    <!-- Tableau des administrateurs -->
    <div class="bg-white rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">N°</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Nom</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Email</th>
                        <th class="px-6 py-4 text-sm font-medium text-neutral-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($admins as $admin)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $i++ }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $admin->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-neutral-900">{{ $admin->user->email }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="#"
                                   class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="#"
                                   class="p-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.delete', ['id'=> $admin->id]) }}"
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
                        <td colspan="4" class="px-6 py-8 text-center text-neutral-500">
                            Aucun administrateur trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
