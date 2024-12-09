@extends('layouts.default')

@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- Statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Utilisateurs -->
        <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Utilisateurs</h3>
            <p class="text-3xl font-bold text-blue-500">{{ $users }}</p>
            <p class="text-sm text-neutral-500 mt-2">Total des utilisateurs</p>
        </div>

        <!-- Administrateurs -->
        <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-red-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Administrateurs</h3>
            <p class="text-3xl font-bold text-red-500">{{ $admins }}</p>
            <p class="text-sm text-neutral-500 mt-2">Total des administrateurs</p>
        </div>

        <!-- Sessions -->
        <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Sessions</h3>
            <p class="text-3xl font-bold text-green-500">{{ $sessions_en_cours }}</p>
            <p class="text-sm text-neutral-500 mt-2">Sessions en cours</p>
        </div>

        <!-- Examens -->
        <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-purple-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-2">Examens</h3>
            <p class="text-3xl font-bold text-purple-500">{{ $examens_semaine->count() }}</p>
            <p class="text-sm text-neutral-500 mt-2">Cette semaine</p>
        </div>
    </div>

    <!-- Examens de la semaine -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-neutral-900">Examens de la semaine</h2>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Heure</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cours</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Professeur</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Local</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($examens_semaine as $examen)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($examen->date)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $examen->heure }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $examen->intitule }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $examen->professeur }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $examen->n_local }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('surveillants', ['id' => $examen->id]) }}"
                                       class="inline-flex items-center p-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                                       title="Gérer les surveillants">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('examens.download.pdf', ['id' => $examen->id]) }}"
                                       class="inline-flex items-center p-1.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors"
                                       title="Télécharger PDF">
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
                            <td colspan="6" class="px-4 py-6 text-sm text-center text-gray-500">
                                Aucun examen prévu cette semaine
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Derniers PVs soumis -->
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-neutral-900">Derniers PVs soumis</h2>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($derniers_pvs as $pv)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-500/10 p-2 rounded-lg">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-neutral-900 font-medium">{{ $pv->examen_nom }}</h4>
                            <p class="text-sm text-neutral-500">Soumis par {{ $pv->user_name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-neutral-500">{{ \Carbon\Carbon::parse($pv->created_at)->diffForHumans() }}</span>
                        <!-- Bouton de téléchargement PDF -->
                        <a href="{{ route('pv.download', ['id' => $pv->id]) }}"
                           class="inline-flex items-center p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
                           title="Télécharger le PV">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-center text-neutral-500">Aucun PV soumis récemment</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
