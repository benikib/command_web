@extends('layouts.default')

@section("content")
<div class="p-4 sm:p-6 space-y-6">
    <!-- En-tête avec le nom du surveillant et bouton retour -->
    <div class="bg-white rounded-xl p-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-neutral-900">Performance de Surveillance</h1>
            <p class="text-sm text-neutral-600">Surveillant : {{ $user->name }}</p>
        </div>
        <button onclick="window.history.back()" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors text-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Retour
        </button>
    </div>

    <!-- Statistiques et autres contenus -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-neutral-500 mb-1">Total Surveillances</h3>
            <p class="text-2xl font-bold text-blue-500">
                {{ $pvs->count() }}
            </p>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-neutral-500 mb-1">Sessions Participées</h3>
            <p class="text-2xl font-bold text-green-500">
                {{ $sessions->count() }}
            </p>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-neutral-500 mb-1">Heures de Surveillance</h3>
            <p class="text-2xl font-bold text-yellow-500">
                {{ $pvs->sum('dure') }}h
            </p>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-neutral-500 mb-1">Locaux Différents</h3>
            <p class="text-2xl font-bold text-purple-500">
                {{ $pvs->unique('local')->count() }}
            </p>
        </div>
    </div>

    <!-- Graphique -->
    <div class="bg-white rounded-xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-neutral-900">Répartition par Session</h2>
            <div class="flex gap-2">
                @foreach($sessions as $session)
                    <a href="{{ route('session.surveillance.pdf', ['session_id' => $session->id, 'user_id' => request()->route('id')]) }}"
                       class="inline-flex items-center px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 10v6m0 0l-3-3m3 3l3-3M3 17v1a3 3 0 003 3h12a3 3 0 003-3v-1m-2-4l-2 2m0 0l-2-2m2 2V7"/>
                        </svg>
                        Session {{ $session->intitule }}
                    </a>
                @endforeach
            </div>
        </div>
        <div style="height: 300px;">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <!-- Tableau détaillé des surveillances -->
    <div class="bg-white rounded-xl p-6">
        <h2 class="text-lg font-semibold text-neutral-900 mb-4">Détail des Surveillances</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Local</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matière</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durée</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étudiants</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pvs as $pv)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ \Carbon\Carbon::parse($pv->created_at)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pv->local }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pv->examen->matiere }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pv->dure }}h</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pv->n_etudiants_enregistre }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart');
    const pvs = @json($pvs);

    // Grouper les PVs par session
    const sessionData = pvs.reduce((acc, pv) => {
        const sessionId = pv.examen.session_examens_id;
        if (!acc[sessionId]) {
            acc[sessionId] = {
                count: 0,
                etudiants: 0,
                heures: 0
            };
        }
        acc[sessionId].count++;
        acc[sessionId].etudiants += pv.n_etudiants_enregistre;
        acc[sessionId].heures += parseInt(pv.dure);
        return acc;
    }, {});

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(sessionData).map(id => `Session ${id}`),
            datasets: [{
                label: 'Surveillances',
                data: Object.values(sessionData).map(d => d.count),
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                label: 'Heures',
                data: Object.values(sessionData).map(d => d.heures),
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endsection
