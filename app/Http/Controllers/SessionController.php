<?php

namespace App\Http\Controllers;

use App\Models\SessionExamen;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mention' => 'required|string|max:255',
            'promotion' => 'required|string|max:255',
            'intitule' => 'required|string|max:255',
            'semestre' => 'required|string|max:255',
            'an_academique' => 'required|string|max:255',
        ]);

        // Vérifier si une session similaire existe déjà
        $existingSession = SessionExamen::where('mention', $validatedData['mention'])
            ->where('promotion', $validatedData['promotion'])
            ->where('semestre', $validatedData['semestre'])
            ->first();

        if ($existingSession) {
            // Créer une nouvelle session
            $newSession = SessionExamen::create($validatedData);

            // Recréer les examens en modifiant uniquement la date
            foreach ($existingSession->examens as $examen) {
                $newExamen = $examen->replicate(); // Crée une copie de l'examen
                $newExamen->session_examens_id = $newSession->id; // Lier à la nouvelle session
                $newExamen->date_examen = $this->getNextWeekdayDate($examen->date_examen); // Incrémenter la date
                $newExamen->save();
            }

            return redirect()->route('sessions.index')->with('success', 'Les examens ont été recréés avec de nouvelles dates.');
        }

        // Créer une nouvelle session si elle n'existe pas
        $session = SessionExamen::create($validatedData);
        dd($existingSession);
        return redirect()->route('sessions.index')->with('success', 'Session créée avec succès.');
    }

    private function getNextWeekdayDate($date)
    {
        $date = \Carbon\Carbon::parse($date)->addDay();
        while ($date->isSunday()) {
            $date->addDay();
        }
        return $date;
    }
}
