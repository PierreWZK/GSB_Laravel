<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Medicaments;

class MedicamentsController extends Controller
{
    public function liste()
    {
        $medicaments = Medicaments::all();
        $medicament = Medicaments::all()->first();
        
        return view("medicaments", ["medicament" => $medicament,"medicaments" => $medicaments]);
    }

    // public function search()
    // {
    //     $res = request()->input('resa');
    //     $nom = request()->input('nom');
    //     // dd($nom);
    //     $prenom = request()->input('prenom');
    //     // dd($prenom);

    //     if ($nom != NULL) {
    //         $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$nom%")
    //         ->get();
    //     } elseif ($prenom != NULL) {
    //         $searchVisiteur = Visiteur::where('VIS_PRENOM', 'like', "$prenom%")
    //         ->get();
    //     } else {
    //         $res = "";
    //         $searchVisiteur = Visiteur::where('VIS_NOM', 'like', "$res%")
    //         ->get();
    //     }
        
    //     return view('visiteur')->with('visiteurs', $searchVisiteur);
    // }
}
