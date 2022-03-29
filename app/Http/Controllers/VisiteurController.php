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

    public function search()
    {
        $res = request()->input('resa');
        $nom = request()->input('nom');
        // dd($nom);
        $prenom = request()->input('prenom');
        // dd($prenom);
        $matricule = request()->input('matricule');
        // dd($matricule);
        $ville = request()->input('ville');
        // dd($ville);
        $cp = request()->input('cp');
        // dd($cp);
        $codelabo = request()->input('codelabo');
        // dd($cadolabo);

        if ($matricule != NULL) {
            $searchVisiteur = Visiteur::where('VIS_MATRICULE', 'like', "$matricule%")
            ->get();
        } elseif ($nom != NULL) {
            $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$nom%")
            ->get();
        } elseif ($prenom != NULL) {
            $searchVisiteur = Visiteur::where('Vis_NOM', 'like', "$prenom%")
            ->get();
        } elseif ($ville != NULL) {
            $searchVisiteur = Visiteur::where('VIS_ADRESSE', 'like', "$ville%")
            ->get();
        } elseif ($codelabo != NULL) {
            $searchVisiteur = Visiteur::where('LAB_CODE', 'like', "$codelabo%")
            ->get();
        } else {
            $res = "";
            $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$res%")
            ->get();
        }
        
        return view('visiteur')->with('visiteurs', $searchVisiteur);
    }
}
