<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        @page {
            margin: 0.5cm;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Horaire des Examens</div>
        <div class="subtitle">
            {{ $session->intitule }} - {{ $session->promotion }}<br>
            Année Académique : {{ $session->an_academique }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="12%">Date</th>
                <th width="10%">Heure</th>
                <th width="35%">Cours</th>
                <th width="25%">Professeur</th>
                <th width="18%">Local</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examens as $examen)
            <tr>
                <td>{{ \Carbon\Carbon::parse($examen->date)->format('d/m/Y') }}</td>
                <td>{{ $examen->heure }}</td>
                <td>{{ $examen->intitule }}</td>
                <td>{{ $examen->professeur }}</td>
                <td>{{ $examen->n_local }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Document généré le {{ now()->format('d/m/Y à H:i') }}</p>
    </div>
</body>
</html>
