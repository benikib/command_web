@extends('layouts.personnel')
@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- En-tête avec informations de l'examen -->
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 shadow-lg border border-gray-700">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-gray-700/50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-400 mb-1">Session</h3>
                <p class="text-lg font-semibold text-white">{{ $session->intitule }}</p>
                <p class="text-sm text-gray-300">{{ $session->promotion }} - {{ $session->mention }}</p>
            </div>
            <div class="bg-gray-700/50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-400 mb-1">Examen</h3>
                <p class="text-lg font-semibold text-white">{{ $examen->intitule }}</p>
                <p class="text-sm text-gray-300">Prof. {{ $examen->professeur }}</p>
            </div>
            <div class="bg-gray-700/50 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-400 mb-1">Date & Heure</h3>
                <p class="text-lg font-semibold text-white">{{ \Carbon\Carbon::parse($examen->date)->format('d/m/Y') }}</p>
                <p class="text-sm text-gray-300">{{ $examen->heure }}</p>
            </div>
        </div>
    </div>

    <!-- Formulaire du PV -->
    <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700">
        <div class="p-4 sm:p-6 border-b border-gray-700">
            <h2 class="text-lg font-semibold text-white">Procès-Verbal de Surveillance</h2>
        </div>
        <form action="{{ route('soumis.stor') }}" method="POST" class="p-4 sm:p-6 space-y-6">
            @csrf
            <input type="hidden" name="examen_id" value="{{ $examen->id }}">

            <!-- Informations générales -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Local</label>
                    <input type="text" name="local"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Durée</label>
                    <input type="text" name="dure"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Horaires -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure début</label>
                    <input type="time" name="hd"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure fin</label>
                    <input type="time" name="hfin"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure clôture</label>
                    <input type="time" name="hcloture"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Heure communication</label>
                    <input type="time" name="hcom"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Agents -->
            <div class="space-y-4">
                <h3 class="text-md font-medium text-white">Agents de surveillance</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($agents as $key => $agent)
                    <div class="flex items-center p-4 bg-gray-700/50 rounded-lg">
                        <input type="checkbox" name="agent{{ $key + 1 }}" value="{{ $agent->id }}"
                               class="w-4 h-4 text-blue-500 bg-gray-700 border-gray-600 rounded focus:ring-blue-500">
                        <label class="ml-3">
                            <span class="block text-sm font-medium text-white">{{ $agent->name }}</span>
                            <span class="block text-sm text-gray-400">{{ $agent->email }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre d'étudiants enregistrés</label>
                    <input type="number" name="n_etudiant"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre de dépôts</label>
                    <input type="number" name="n_etudiants_depot"
                           class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Description / Observations</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- Boutons d'action -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 sm:gap-4 pt-4">
                <button type="button" onclick="history.back()"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-medium text-white bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors">
                    Annuler
                </button>
               <a href="{{ route('pv.download', ['id' => $examen->id]) }}"
                   class="w-full sm:w-auto px-6 py-2.5 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg transition-colors text-center">
                    Télécharger PDF
                </a>
                <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors">
                    Soumettre le PV
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
