<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-title {
            font-weight: bold;
            margin-bottom: 5px;
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
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Détails de l'Examen</div>
        <div>{{ $examen->intitule }}</div>
    </div>

    <div class="info-section">
        <div class="info-title">Informations Générales</div>
        <p>Date: {{ $examen->date }}</p>
        <p>Heure: {{ $examen->heure }}</p>
        <p>Local: {{ $examen->n_local }}</p>
        <p>Professeur: {{ $examen->professeur }}</p>
    </div>

    <div class="info-section">
        <div class="info-title">Surveillants Assignés</div>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($examen->surveillants as $surveillant)
                <tr>
                    <td>{{ $surveillant->user->name }}</td>
                    <td>{{ $surveillant->user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
