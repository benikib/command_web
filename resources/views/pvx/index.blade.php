@extends("layouts.default")
@section("content")
<div class="p-4 sm:p-6 space-y-6">
    <!-- En-tête -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-neutral-100">Procès-Verbaux d'Examens</h1>
    </div>

    <!-- Liste des PVs -->
    <div class="space-y-6">
        @forelse($pvs as $pv)
        <div class="bg-white rounded-xl overflow-hidden">
            <!-- En-tête du PV -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-neutral-900">PV N° {{ $pv->id }}</h2>
                        <p class="text-sm text-neutral-600">Session : {{ $session->intitule }}</p>
                    </div>
                    <div class="flex gap-3">
                        <button class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors"
                                onclick="window.print()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                        </button>
                        <a href="#" class="p-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contenu du PV -->
            <div class="p-6">
                <!-- Informations de l'examen -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-neutral-500 mb-1">Informations générales</h3>
                        <div class="space-y-2">
                            <p class="text-neutral-900">Local : {{ $pv->local }}</p>
                            <p class="text-neutral-900">Durée : {{ $pv->dure }} H</p>
                            <p class="text-neutral-900">Horaire : {{ $pv->hcom }} - {{ $pv->hfin }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-neutral-500 mb-1">Déroulement</h3>
                        <div class="space-y-2">
                            <p class="text-neutral-900">Début : {{ $pv->hdebut }}</p>
                            <p class="text-neutral-900">Étudiants présents : {{ $pv->n_etudiants_enregistre }}</p>
                            <p class="text-neutral-900">Copies remises : {{ $pv->n_depot }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h3 class="text-sm font-medium text-neutral-500 mb-2">Description</h3>
                    <p class="text-neutral-900 bg-gray-50 rounded-lg p-4">{{ $pv->description }}</p>
                </div>

                <!-- Surveillants -->
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-neutral-500 mb-2">Surveillants</h3>
                    <div class="bg-gray-50 rounded-lg divide-y divide-gray-200">
                        @foreach (json_decode($pv->agents) as $agent)
                        <div class="p-4">
                            <p class="text-neutral-900 font-medium">{{ $agent->name }}</p>
                            <p class="text-neutral-600 text-sm">{{ $agent->grade }} - {{ $agent->filiere }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl p-6 text-center">
            <p class="text-neutral-500">Aucun procès-verbal trouvé</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
