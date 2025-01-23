<?php

namespace App\Http\Controllers;

use App\Models\pv;
use DB;
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
        $pv = DB::table('pvs')
            ->join('examens', 'pvs.examen_id', '=', 'examens.id')
            ->join('session_examens', 'examens.session_examens_id', '=', 'session_examens.id')
            ->where('pvs.id', '=', $id)
            ->select('pvs.*', 'examens.*', 'session_examens.intitule as session_name')
            ->first();

        $agents = json_decode(json_decode($pv->agents));

        $pdf = PDF::loadView('soumispv.pv-pdf', [
            'pv' => $pv,
            'agents' => $agents
        ]);

        $filename = 'pv_surveillance_' . $pv->id . '.pdf';
        return $pdf->download($filename);
    }
}
