<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Rapport de Surveillance</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Attestation de Surveillance d'Examen</h2>
        <h3>Session {{ $session->intitule }}</h3>
    </div>

    <div class="info">
        <p><strong>Surveillant:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Nombre total de surveillances:</strong> {{ $total_surveillances }}</p>
        <p><strong>Date d'édition:</strong> {{ now()->format('d/m/Y') }}</p>
    </div>

    @if($pvs->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Local</th>
                    <th>Matière</th>
                    <th>Heure Début</th>
                    <th>Heure Fin</th>
                    <th>Durée</th>
                    <th>Nombre d'étudiants</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pvs as $pv)
                    <tr>
                        <td>{{ $pv->local }}</td>
                        <td>{{ $pv->examen->intitule }}</td>
                        <td>{{ $pv->hdebut }}</td>
                        <td>{{ $pv->hfin }}</td>
                        <td>{{ $pv->dure }}</td>
                        <td>{{ $pv->n_etudiants_enregistre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #666;">Aucune surveillance n'a été trouvée pour cette session.</p>
    @endif

    <div class="footer">
        <p>Ce document est généré automatiquement et ne nécessite pas de signature.</p>
        <p>Date de génération : {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
