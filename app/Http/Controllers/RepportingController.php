<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Examen;
use App\Models\SessionExamen;
use App\Models\Surveillant;
use App\Models\User;
use App\Models\Pv;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RepportingController extends Controller
{

    public function admin(Request $request)
    {
        $admins = Admin::with('user')->get();
        $i = 1;
        return view("admin.index", compact("admins", "i"));

    }
    public function statistique($id)
    {
        $user = User::findOrFail($id);

        // Récupérer tous les PVs où l'utilisateur est un agent
        $pvs = Pv::with(['examen.sessionExamen'])
            ->get()
            ->filter(function ($pv) use ($id) {
                // Vérifier si l'ID existe dans le tableau d'agents
                return collect(json_decode($pv->agents, true))->pluck('id')->contains($id);
            });
        

        // Extraire les sessions uniques à partir des PVs
        $sessions = $pvs->map(function ($pv) {
            return $pv->examen->sessionExamen;
        })->unique('id')->values();

        // Pour vérifier les données
        // dd([
        //     'total_pvs_filtered' => $pvs->count(),
        //     'sessions' => $sessions->toArray()
        // ]);
        // dd($user);
        return view("users.programme", compact("pvs", "sessions", "user"));
    }

    public function users(Request $request)
    {
        $users = User::all();
        $i = 1;

        return view("users.index", compact("users", "i"));

    }
    public function examens()
    {
        $admins = Admin::with('user')->get();
        $i = 1;
        return view("examens.index", compact("admins", "i"));
    }
    public function examen_store(Request $request)
    {


        try {
            $validated = $request->validate([
                'intitule' => 'required',
            ]);
            Examen::create([
                'intitule' => $request->intitule,
                'professeur' => $request->professeur,
                'n_local' => $request->n_local,
                'date' => $request->date,
                'heure' => $request->heure,
                'session_examens_id' => $request->session_examens_id,
            ]);
            return redirect()->back()->with('success', 'creation avec success');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('erreur', 'error');
        }
    }
    public function examen_delete($id)
    {
        // Trouver le projet par ID
        $project = Examen::findOrFail($id);

        // Supprimer le projet
        $project->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'suppression reussi');
    }

    function admin_store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required',
            ]);
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $admin = Admin::create([
                    'user_id' => $user->id,
                ]);
            } else {
                return redirect()->back()->with('erreur', 'mail incorrect');
            }
            return redirect()->back()->with('success', 'creation avec success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('erreur', 'error');
        }
    }
    public function destroy_admin($id)
    {
        $project = Admin::findOrFail($id);
        $project->delete();
        return redirect('/administrateur');
    }
    public function session()
    {
        $sessions = SessionExamen::with('user')->get();
        $i = 1;
        return view("session.index", compact("sessions", "i"));
    }
    function session_store(Request $request)
    {
        try {
            $validated = $request->validate([

                // 'email' => 'required',
            ]);


            $session = SessionExamen::create([
                'intitule' => $request->intitule,
                'promotion' => $request->promotion,
                'mention' => $request->mention,
                'semestre' => $request->semestre,
                'an_academique' => $request->an_academique,
            ]);






            return redirect()->back()->with('success', 'creation avec success');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('erreur', 'error');
        }
    }
    public function session_delete($id)
    {
        // Trouver le projet par ID
        $project = SessionExamen::findOrFail($id);

        // Supprimer le projet
        $project->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'creation avec success');
    }
    public function session_examens($id)
    {
        // Trouver le projet par ID
        $session = SessionExamen::findOrFail($id);
        $examens = DB::table('examens')
            ->where('examens.session_examens_id', '=', $session->id)

            ->select('examens.*')
            ->get();
        $i = 1;


        // Rediriger avec un message de succès
        return view("examens.index", compact("examens", "i", "session"));
    }

    public function surveillants($id)
    {
        $examen = Examen::findOrFail($id);
        $surveillants = DB::table('users')
            ->leftJoin('surveillants', 'users.id', '=', 'surveillants.user_id')
            ->where('surveillants.examen_id', '=', $id)

            ->select('users.*', 'surveillants.id as surveillant_id')
            ->get();

        $users_dispo = DB::table('users')
            ->leftJoin('surveillants', function ($join) use ($id) {
                $join->on('users.id', '=', 'surveillants.user_id')
                    ->where('surveillants.examen_id', '=', $id);
            })
            ->whereNull('surveillants.id')
            ->select('users.*')
            ->distinct()
            ->get();



        return view("surveillants.index", compact("examen", "users_dispo", "surveillants"));

    }
    public function surveillant_delete($id)
    {

        $project = Surveillant::findOrFail($id);

        // Supprimer le projet
        $project->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'creation avec success');
    }
    public function surveillant_store(Request $request)
    {


        try {
            $validated = $request->validate([

                // 'email' => 'required',

            ]);




            $surveillants = Surveillant::create([
                'user_id' => $request->user_id,
                'examen_id' => $request->examen_id,
            ]);






            return redirect()->back()->with('success', 'creation avec success');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('erreur', 'error');
        }


    }
    public function pvx($id)
    {

        $examen = Examen::findOrFail($id);
        $session = SessionExamen::findOrFail($examen->id);
        $pvs = DB::table('pvs')
            ->where('pvs.examen_id', '=', $id)
            ->get();




        return view("pvx.index", compact('session', 'examen', 'pvs'));
    }

    public function session_edit($id)
    {
        $session = SessionExamen::findOrFail($id);
        return view('session.edit', compact('session'));
    }

    public function session_update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'intitule' => 'required',
                'promotion' => 'required',
                'mention' => 'required',
                'semestre' => 'required',
                'an_academique' => 'required',
            ]);

            $session = SessionExamen::findOrFail($id);
            $session->update($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Session mise à jour avec succès'
                ]);
            }

            return redirect()->back()->with('success', 'Session mise à jour avec succès');
        } catch (\Throwable $th) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de la mise à jour de la session'
                ], 422);
            }

            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la session');
        }
    }

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
            $lastDate = now(); // Date de départ

            foreach ($existingSession->examens as $examen) {
                $newExamen = $examen->replicate(); // Crée une copie de l'examen
                $newExamen->session_examens_id = $newSession->id; // Lier à la nouvelle session

                // Obtenir la prochaine date disponible
                $lastDate = $this->getNextWeekdayDate($lastDate);
                $newExamen->date = $lastDate;

                $newExamen->save();
            }

            return redirect()->route('examens.index', ['session_id' => $newSession->id])
                ->with('success', 'Les examens ont été recréés avec de nouvelles dates.');
        }

        // Créer une nouvelle session si elle n'existe pas
        $session = SessionExamen::create($validatedData);

        return redirect()->route('examens.index', ['session_id' => $session->id])
            ->with('success', 'Session créée avec succès.');
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
