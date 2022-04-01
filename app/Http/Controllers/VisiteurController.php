<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Visiteur;

class VisiteurController extends Controller
{
    public function liste()
    {
        $visiteurs = Visiteur::all();
        $visiteur = Visiteur::all()->first();
        
        return view("visiteur", ["visiteur" => $visiteur,"visiteurs" => $visiteurs]);
    }

    public function searchVisiteur(Request $request)
    {
        $res = request()->input('resa');
        $q = request()->input('q');
        $ville = $request->ville;
        // dd($request);

        if ($q != NULL && $ville != NULL) {
            $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$q%")
            ->Where('VIS_VILLE', 'like', "$ville%")
            ->get();
        } elseif ($q != NULL) {
            $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$q%")
            ->get();
        } elseif ($ville != NULL) {
            $searchVisiteur = Visiteur::where('VIS_VILLE', 'like', "$ville%")
            ->get();
        } else {
            $res = "";
            $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$res%")
            ->get();
        }
        
        return view('visiteur')->with('visiteurs', $searchVisiteur);
    }
}
