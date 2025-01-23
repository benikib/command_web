<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Examen;
use App\Models\pv;
use App\Models\SessionExamen;
use App\Models\Surveillant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Date;
use PDF;

class SurveillantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $totalsurveillance = DB::table('surveillants')
            ->where('surveillants.user_id', '=', $id)
            ->select(DB::raw('count(*) as total'))
            ->value('total');
        // dd($totalsurveillances);

        $examens_restants = DB::table('examens')
            ->join('surveillants', 'examens.id', '=', 'surveillants.examen_id')
            ->where('surveillants.user_id', '=', $id)
            ->where('examens.date', '<', Date::now())
            ->select('examens.*')
            ->count();

        $examens = DB::table('examens')
            ->join('surveillants', 'examens.id', '=', 'surveillants.examen_id')
            ->join('session_examens', 'examens.session_examens_id', '=', 'session_examens.id')
            ->where('surveillants.user_id', '=', $id)
            ->select('examens.*', 'session_examens.intitule as session_name')
            ->orderBy('examens.date', 'asc')
            ->orderBy('examens.heure', 'asc')
            ->get();

        $i = 1;
        $totalsurveillances = DB::table('surveillants as s')
            ->join('examens as e', 'e.id', '=', 's.examen_id')
            ->join('session_examens as se', 'se.id', '=', 'e.session_examens_id')
            ->where('s.user_id', '=', $id)
            ->select(DB::raw('se.id as session_id, se.intitule as session_name, COUNT(*) as total'))
            ->groupBy('se.id', 'se.intitule')
            ->orderBy('total', 'desc')
            ->get();




        return view("soumispv.index", compact("i", 'totalsurveillance', 'examens_restants', 'totalsurveillances', 'examens'));

    }
    public function programme($id)
    {
        $examens = DB::table('examens')
            ->join('surveillants', 'examens.id', '=', 'surveillants.examen_id')
            ->where('surveillants.user_id', '=', $id)
            ->select('examens.*')
            ->get();

        $totalsurveillances = DB::table('surveillants as s')
            ->join('examens as e', 'e.id', '=', 's.examen_id')
            ->join('session_examens as se', 'se.id', '=', 'e.session_examens_id')
            ->where('s.user_id', '=', $id)
            ->select(DB::raw('se.id as session_id, COUNT(*) as total'))
            ->groupBy('se.id')
            ->orderBy('total', 'desc')
            ->get();

        $i = 1;

        return view("soumispv.programme", compact("examens", "i", "totalsurveillances"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pv($id, $ex)
    {
        $examen = Examen::findOrFail($ex);
        $session = SessionExamen::findOrFail($examen->session_examens_id);
        $agents = DB::table('users')
            ->leftJoin('surveillants', 'users.id', '=', 'surveillants.user_id')
            ->where('surveillants.examen_id', '=', $ex)

            ->select('users.*')
            ->get();

        $pvs = Pv::with(['examen.sessionExamen'])
            ->get()
            ->filter(function ($pv) use ($id, $ex) {
                // Vérifier si l'ID existe dans le tableau d'agents
                return collect(json_decode($pv->agents, true))->pluck('id')->contains($id) && $pv->examen_id == $ex;
            });

        dd($pvs);
        if (!$pvs->isEmpty()) {
            $agents = json_decode($pvs->agents);

            $pdf = PDF::loadView('soumispv.pv-pdf', [
                'pv' => $pvs,
                'agents' => $agents
            ]);

            $filename = 'pv_surveillance_' . $pvs->id . '.pdf';
            return $pdf->download($filename);

        }

        // Sinon, afficher les résultats



        $user = User::findOrFail(Auth::user()->id);





        //    dd($user);
        return view("soumispv.pv", compact("session", 'examen', 'agents', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function pv_store(Request $request)
    {
        try {
            $validated = $request->validate([
                //'intitule' => 'required',
            ]);
            // Récupération des IDs des agents depuis la requête
            $agentIds = [
                $request->agent1,
                $request->agent2,
                $request->agent3,
                $request->agent4,
            ];

            // Filtrer les IDs non nuls pour éviter les erreurs de requête
            $agentIds = array_filter($agentIds);

            // Récupération des agents depuis la base de données
            $agents = DB::table('users')->whereIn('id', $agentIds)->get();

            DB::table('surveillants')
                ->whereIn('id', $agentIds)  // Mettre à jour les lignes avec des ID dans $agentIds
                ->update([
                    'participer' => true,     // Mettre à jour la colonne participer
                    'local' => $request->local // Mettre à jour la colonne local
                ]);

            // Encodage en JSON
            $json_agents = json_encode($agents);

            //dd($request);
            pv::create([
                'local' => $request->local,
                'dure' => $request->dure,
                'hcom' => $request->hcom,
                'hfin' => $request->hfin,
                'agents' => $json_agents,
                'hdebut' => $request->hd,
                'hcloture' => $request->hcloture,
                'n_etudiants_enregistre' => $request->n_etudiant,
                'n_depot' => $request->n_etudiants_depot,
                'description' => $request->description,
                'examen_id' => $request->examen_id,
            ]);


            return SurveillantController::index(Auth::user()->id);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('erreur', 'error');
        }
        return redirect()->back()->with('erreur', 'error');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surveillant $surveillant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surveillant $surveillant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surveillant $surveillant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surveillant $surveillant)
    {
        //
    }

    public function downloadSurveillancesPDF($session_id, $user_id)
    {
        // Récupérer l'utilisateur
        $user = User::findOrFail($user_id);

        // Récupérer la session
        $session = SessionExamen::findOrFail($session_id);

        // Récupérer et filtrer les PVs
        $pvs = Pv::whereHas('examen', function ($query) use ($session_id) {
            $query->where('session_examens_id', $session_id);
        })
            ->with('examen') // Eager loading de la relation examen
            ->get()
            ->filter(function ($pv) use ($user_id) {
                return collect(json_decode($pv->agents, true))->where('id', $user_id)->isNotEmpty();
            });

        // Générer le PDF
        $pdf = PDF::loadView('pdf.surveillance', [
            'user' => $user,
            'session' => $session,
            'pvs' => $pvs,
            'total_surveillances' => $pvs->count()
        ]);

        $filename = 'attestation_surveillance_session_' . $session_id . '_' . $user->name . '.pdf';
        return $pdf->download($filename);
    }

    public function downloadPV($pv_id)
    {
        $pv = DB::table('pvs')
            ->join('examens', 'pvs.examen_id', '=', 'examens.id')
            ->join('session_examens', 'examens.session_examens_id', '=', 'session_examens.id')
            ->where('pvs.id', '=', $pv_id)
            ->select('pvs.*', 'examens.*', 'session_examens.intitule as session_name')
            ->first();

        $agents = json_decode($pv->agents);

        $pdf = PDF::loadView('soumispv.pv-pdf', [
            'pv' => $pv,
            'agents' => $agents
        ]);

        $filename = 'pv_surveillance_' . $pv->id . '.pdf';
        return $pdf->download($filename);
    }

    public function downloadAllSurveillancesPDF($user_id)
    {
        // Récupérer l'utilisateur
        $user = User::findOrFail($user_id);

        // Récupérer tous les PVs de l'utilisateur
        $pvs = Pv::with(['examen.sessionExamen'])
            ->get()
            ->filter(function ($pv) use ($user_id) {
                return collect($pv->agents)->where('id', $user_id)->isNotEmpty();
            });

        // Récupérer toutes les sessions
        $sessions = SessionExamen::whereHas('examens', function ($query) use ($user_id) {
            $query->whereHas('pvs', function ($q) use ($user_id) {
                $q->whereRaw("JSON_CONTAINS(agents, JSON_OBJECT('id', ?))", [$user_id]);
            });
        })->get();

        // Générer le PDF
        $pdf = PDF::loadView('pdf.all_surveillances', [
            'user' => $user,
            'pvs' => $pvs,
            'sessions' => $sessions,
            'total_surveillances' => $pvs->count(),
            'total_heures' => $pvs->sum('dure'),
            'total_sessions' => $sessions->count()
        ]);

        $filename = 'performance_surveillance_' . $user->name . '.pdf';
        return $pdf->download($filename);
    }
}
