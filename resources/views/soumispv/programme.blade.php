@extends('layouts.personnel')

@section("content")
<div class="p-4 sm:p-6 space-y-6">
    <!-- En-tête -->
    <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
        <h1 class="text-xl font-semibold text-white mb-4">Programme des Surveillances</h1>
        <p class="text-gray-400">Vue d'ensemble de vos surveillances programmées</p>
    </div>

    <!-- Tableau des examens -->
    <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
        <div class="p-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-white">Liste des Examens</h2>

                <!-- Boutons d'export -->
                <div class="flex gap-2">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors text-sm" data-hs-overlay="#hs-focus-management-modal">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Exporter
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto max-h-[400px]">
            <table class="w-full">
                <thead class="bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">N°</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Cours</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Heure</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Local</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($examens as $examen)
                    <tr class="hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $i++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $examen->intitule }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $examen->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $examen->heure }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $examen->n_local }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-2">
                                <a href="{{route('pv.soumis', ['ex'=> $examen->id, 'id'=>Auth::user()->id])}}"
                                   class="inline-flex items-center justify-center p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-400">
                            Aucun examen programmé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Graphique des participations -->
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
            <h3 class="text-lg font-semibold text-white mb-4">Répartition par Session</h3>
            <div class="h-[300px]">
                <canvas id="participationsChart" class="w-full h-full"></canvas>
            </div>
        </div>

        <!-- Statistiques détaillées -->
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
            <h3 class="text-lg font-semibold text-white mb-4">Statistiques Détaillées</h3>
            <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2">
                @foreach($totalsurveillances as $surveillance)
                <div class="p-4 bg-gray-700/50 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300">Session {{ $surveillance->session_id }}</span>
                        <span class="text-blue-400 font-medium">{{ $surveillance->total }} surveillances</span>
                    </div>
                    <div class="w-full bg-gray-600 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full"
                             style="width: {{ ($surveillance->total / $totalsurveillances->max('total')) * 100 }}%">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
window.addEventListener('load', () => {
    const ctx = document.getElementById('participationsChart').getContext('2d');
    const data = @json($totalsurveillances);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => `Session ${item.session_id}`),
            datasets: [{
                label: 'Nombre de surveillances',
                data: data.map(item => item.total),
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    borderColor: 'rgba(75, 85, 99, 0.3)',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(75, 85, 99, 0.2)'
                    },
                    ticks: {
                        color: '#9CA3AF',
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#9CA3AF'
                    }
                }
            }
        }
    });
});
</script>
@endsection
