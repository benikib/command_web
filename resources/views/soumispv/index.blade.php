@extends('layouts.personnel')
@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- En-tête avec statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Total surveillances -->
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] border border-gray-700">
            <div class="flex items-center gap-4 mb-3">
                <div class="bg-blue-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-400">Total surveillances</p>
                    <h3 class="text-2xl font-bold text-white">{{ $totalsurveillance }}</h3>
                </div>
            </div>
        </div>

        <!-- Examens à venir -->
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] border border-gray-700">
            <div class="flex items-center gap-4 mb-3">
                <div class="bg-yellow-500/10 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-400">Examens à surveiller</p>
                    <h3 class="text-2xl font-bold text-white">{{ $examens_restants }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des examens à surveiller -->
    <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
        <div class="p-6 border-b border-gray-700">
            <h2 class="text-lg font-semibold text-white">Prochains examens à surveiller</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Heure</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Cours</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Local</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($examens as $examen)
                    <tr class="hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-300">{{ \Carbon\Carbon::parse($examen->date)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-300">{{ $examen->heure }}</td>
                        <td class="px-6 py-4 text-sm text-gray-300">{{ $examen->intitule }}</td>
                        <td class="px-6 py-4 text-sm text-gray-300">{{ $examen->n_local }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('pv.soumis', ['ex'=> $examen->id, 'id'=>Auth::user()->id]) }}"
                               class="inline-flex items-center px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Voir détails
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                            Aucun examen à surveiller pour le moment
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
