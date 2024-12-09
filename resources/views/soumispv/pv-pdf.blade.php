<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Styles de base */
        body {
            font-family: 'Helvetica', sans-serif;
            line-height: 1.6;
            color: #2d3748;
            margin: 0;
            padding: 30px;
            background-color: #fff;
        }

        /* En-tête */
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #4299e1;
            padding-bottom: 20px;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            color: #2b6cb0;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 5px;
        }

        /* Informations principales */
        .info-section {
            background-color: #f7fafc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .info-label {
            font-size: 12px;
            color: #718096;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #2d3748;
        }

        /* Tableaux */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        th {
            background-color: #4299e1;
            color: #fff;
            font-weight: 600;
            text-align: left;
            padding: 12px;
            font-size: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f7fafc;
        }

        /* Sections */
        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #2b6cb0;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Agents */
        .agents-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 15px;
        }

        .agent-item {
            background-color: #f7fafc;
            padding: 12px;
            border-radius: 6px;
            border-left: 3px solid #4299e1;
        }

        /* Pied de page */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 12px;
            color: #718096;
        }

        .signature-section {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .signature-box {
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Procès-Verbal de Surveillance</div>
        <div class="subtitle">{{ $pv->session_name }}</div>
        <div class="subtitle">Examen : {{ $pv->intitule }}</div>
    </div>

    <div class="info-section">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Date</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($pv->date)->format('d/m/Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Local</div>
                <div class="info-value">{{ $pv->local }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Durée</div>
                <div class="info-value">{{ $pv->dure }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Professeur</div>
                <div class="info-value">{{ $pv->professeur }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Horaires</div>
        <table>
            <tr>
                <th>Début</th>
                <th>Fin</th>
                <th>Clôture</th>
                <th>Communication</th>
            </tr>
            <tr>
                <td>{{ $pv->hdebut }}</td>
                <td>{{ $pv->hfin }}</td>
                <td>{{ $pv->hcloture }}</td>
                <td>{{ $pv->hcom }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Agents de Surveillance</div>
        <div class="agents-grid">
            @foreach($agents as $agent)
            <div class="agent-item">
                <strong>{{ $agent->name }}</strong><br>
                <span style="color: #718096;">{{ $agent->email }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <div class="section-title">Statistiques</div>
        <table>
            <tr>
                <th>Étudiants Enregistrés</th>
                <th>Nombre de Dépôts</th>
                <th>Taux de Participation</th>
            </tr>
            <tr>
                <td>{{ $pv->n_etudiants_enregistre }}</td>
                <td>{{ $pv->n_depot }}</td>
                <td>{{ $pv->n_etudiants_enregistre > 0 ? round(($pv->n_depot / $pv->n_etudiants_enregistre) * 100, 1) : 0 }}%</td>
            </tr>
        </table>
    </div>

    @if($pv->description)
    <div class="section">
        <div class="section-title">Observations</div>
        <p style="background-color: #f7fafc; padding: 15px; border-radius: 6px;">{{ $pv->description }}</p>
    </div>
    @endif

    <div class="signature-section">
        <div class="signature-box">
            <p>Le Surveillant Principal</p>
            <div style="height: 60px;"></div>
            <p>Nom et signature</p>
        </div>
        <div class="signature-box">
            <p>Le Chef de Département</p>
            <div style="height: 60px;"></div>
            <p>Nom et signature</p>
        </div>
    </div>

    <div class="footer">
        <p>Document généré le {{ now()->format('d/m/Y à H:i') }}</p>
        <p>Université de XXXX - Faculté des Sciences</p>
    </div>
</body>
</html>
