<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Performance de Surveillance</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .stats { margin-bottom: 30px; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .stat-box { padding: 15px; background: #f8f9fa; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f5f5f5; }
        .session-header { background: #e9ecef; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Performance de Surveillance</h1>
        <h3>{{ $user->name }}</h3>
        <p>Période : {{ $pvs->min('created_at')->format('d/m/Y') }} - {{ $pvs->max('created_at')->format('d/m/Y') }}</p>
    </div>

    <div class="stats">
        <div class="stats-grid">
            <div class="stat-box">
                <h4>Total Surveillances</h4>
                <p>{{ $total_surveillances }}</p>
            </div>
            <div class="stat-box">
                <h4>Total Sessions</h4>
                <p>{{ $total_sessions }}</p>
            </div>
            <div class="stat-box">
                <h4>Total Heures</h4>
                <p>{{ $total_heures }}h</p>
            </div>
        </div>
    </div>

    @foreach($sessions as $session)
        <div class="session-header">
            <h3>Session : {{ $session->intitule }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Local</th>
                    <th>Matière</th>
                    <th>Durée</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pvs->where('examen.session_examens_id', $session->id) as $pv)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($pv->created_at)->format('d/m/Y') }}</td>
                        <td>{{ $pv->local }}</td>
                        <td>{{ $pv->examen->matiere }}</td>
                        <td>{{ $pv->dure }}h</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html> 
