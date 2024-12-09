<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\SessionExamen;
use Illuminate\Http\Request;
use PDF;
use Session;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examen $examen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Examen $examen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examen $examen)
    {
        //
    }
    public function download($format)
    {
        $examens = Examen::all();

        if ($format === 'pdf') {
            // Logique pour générer le PDF
            $pdf = PDF::loadView('examens.pdf', compact('examens'));
            return $pdf->download('horaire_examens.pdf');
        }

        if ($format === 'excel') {
            // Logique pour générer l'Excel
            return Excel::download(new ExamensExport, 'horaire_examens.xlsx');
        }
    }

    public function downloadPDF($id)
    {
        $examen = Examen::with(['surveillants.user'])->findOrFail($id);

        $pdf = PDF::loadView('examens.pdf', [
            'examen' => $examen
        ]);

        return $pdf->download('examen_' . $examen->intitule . '.pdf');
    }

    public function downloadAllExamens($session_id)
    {
        $session = SessionExamen::with([
            'examens' => function($query) {
                $query->orderBy('date', 'asc')
                      ->orderBy('heure', 'asc');
            }
        ])->findOrFail($session_id);

        $pdf = PDF::loadView('examens.horaire-pdf', [
            'session' => $session,
            'examens' => $session->examens
        ]);

        // Définir l'orientation en paysage
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('horaire_examens_'.$session->intitule.'.pdf');
    }
}
