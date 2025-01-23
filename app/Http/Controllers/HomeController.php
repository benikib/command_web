<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Examen;
use App\Models\SessionExamen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
        // Statistiques de base
        $admins = count(Admin::all());
        $users = count(User::all());
        $sessions = count(SessionExamen::all());
        $examens = count(Examen::all());

        // Examens de la semaine en cours avec plus de détails
        $examens_semaine = Examen::whereBetween('date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])
            ->orderBy('date', 'asc')
            ->orderBy('heure', 'asc')
            ->get();

        // Sessions en cours (avec des examens à venir)
        $sessions_en_cours = SessionExamen::whereHas('examens', function ($query) {
            $query->where('date', '>=', now());
        })->count();

        // Statistiques des sessions par mois
        $t_sessions = DB::table('session_examens')
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as total_sessions')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Derniers PVs soumis - Correction de la requête
        $derniers_pvs = DB::table('pvs')
            ->join('examens', 'pvs.examen_id', '=', 'examens.id')
            ->join('surveillants', 'surveillants.examen_id', '=', 'examens.id')
            ->join('users', 'surveillants.user_id', '=', 'users.id')
            ->select('pvs.*', 'examens.intitule as examen_nom', 'users.name as user_name')
            ->orderBy('pvs.created_at', 'desc')
            ->limit(5)
            ->get();
       

        return view('dashboard', compact(
            'admins',
            'users',
            'sessions',
            'examens',
            't_sessions',
            'examens_semaine',
            'sessions_en_cours',
            'derniers_pvs'
        ));
    }
}
