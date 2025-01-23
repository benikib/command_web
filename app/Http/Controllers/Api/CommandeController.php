<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return response()->json($commandes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'n_depot' => 'required|string',
            'produit' => 'required|string',
            'quantite' => 'required|integer',
            'date_livraison' => 'required|date'
        ]);

        $commande = Commande::create($request->all());
        return response()->json($commande, 201);
    }

    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        return response()->json($commande);
    }

    public function update(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);

        $request->validate([
            'n_depot' => 'string',
            'produit' => 'string',
            'quantite' => 'integer',
            'date_livraison' => 'date'
        ]);

        $commande->update($request->all());
        return response()->json($commande);
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();
        return response()->json(null, 204);
    }
}
