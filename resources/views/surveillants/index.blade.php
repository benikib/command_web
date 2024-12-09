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
    <!-- En-tête avec informations de l'examen -->
    <div class="bg-white rounded-xl p-6">
        <h1 class="text-2xl font-bold text-neutral-900 mb-4">Gestion des Surveillants</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-neutral-500 mb-1">Examen</h3>
                <p class="text-neutral-900 font-medium">{{ $examen->intitule }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-neutral-500 mb-1">Professeur</h3>
                <p class="text-neutral-900 font-medium">{{ $examen->professeur }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-neutral-500 mb-1">Date & Heure</h3>
                <p class="text-neutral-900 font-medium">{{ $examen->date }} - {{ $examen->heure }}</p>
            </div>
        </div>
    </div>

    <!-- Section des surveillants -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Liste des surveillants assignés -->
        <div class="bg-white rounded-xl overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-neutral-900">Surveillants Assignés</h2>
            </div>
            <div class="p-6">
                @if($surveillants->count() > 0)
                <div class="space-y-4">
                    @foreach($surveillants as $surveillant)
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center gap-4">
                            <div class="bg-blue-500/10 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-neutral-900 font-medium">{{ $surveillant->name }}</p>
                                <p class="text-sm text-neutral-500">{{ $surveillant->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('surveillant.delete', ['id' => $surveillant->surveillant_id]) }}"
                           class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-center text-neutral-500">Aucun surveillant assigné</p>
                @endif
            </div>
        </div>

        <!-- Formulaire d'ajout de surveillant -->
        <div class="bg-white rounded-xl overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-neutral-900">Ajouter un Surveillant</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('surveillant_store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="examen_id" value="{{ $examen->id }}">
                    <div class="space-y-4">
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-neutral-700 mb-1">
                                Sélectionner un surveillant
                            </label>
                            <select name="user_id" id="user_id"
                                    class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Choisir un surveillant</option>
                                @foreach($users_dispo as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                                class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                            Ajouter le surveillant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
