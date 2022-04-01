<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Rapport;
use App\Models\Visiteur;
use App\Models\Medicament;
use App\Models\Praticien;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Rapport
    public function index()
    {
        //requete pour recup rapport du user actif et pas les autres
        // https://stackoverflow.com/questions/41621486/laravel-inner-join
        $id = Auth::user()->VIS_MATRICULE;

        $rapports = Rapport::join('praticien', 'rapport_visite.PRA_NUM', '=', 'praticien.PRA_NUM')
            ->where('rapport_visite.VIS_MATRICULE', $id)
            ->get();
        
        // Afficher Praticien dans le dashboard
        $praticiens = Praticien::all();
        
        // Afficher Visiteur dans le dashboard  
        $visiteurs = Visiteur::all();

        // Afficher Medicament dans le dashboard
        $medicaments = Medicament::all(); 

        
        return view("dashboard", ["rapports" => $rapports, "praticiens" => $praticiens, "visiteurs" => $visiteurs,"medicaments" => $medicaments]);
    }
}
