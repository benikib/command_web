<?php

namespace App\Http\Controllers;

use App\Models\pv;
use Illuminate\Http\Request;
use PDF;

class PvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function show(pv $pv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pv $pv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pv $pv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pv $pv)
    {
        //
    }

    public function download($id)
    {
        $pv = Pv::findOrFail($id);

        // Charger la vue du PV avec les données
        $pdf = PDF::loadView('pdf.pv', [
            'pv' => $pv,
            'surveillances' => $pv->surveillances,
            'session' => $pv->session,
            // Ajoutez d'autres données nécessaires
        ]);

        // Générer le nom du fichier
        $filename = 'PV_Session_' . $pv->session->intitule . '_' . now()->format('Y-m-d') . '.pdf';

        // Retourner le PDF en téléchargement
        return $pdf->download($filename);
    }
}
