<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Rapport;
use App\Models\Offrir;
use App\Models\Medicament;
use App\Models\Praticien;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    // Rapport
    public function liste()
    {
        //requete pour recup rapport du user actif et pas les autres
        // https://stackoverflow.com/questions/41621486/laravel-inner-join
        $id = Auth::user()->VIS_MATRICULE;
        $rapports = Rapport::join('praticien', 'rapport_visite.PRA_NUM', '=', 'praticien.PRA_NUM')
            ->where('rapport_visite.VIS_MATRICULE', $id)
            ->get();
        
        // Afficher offrir dans le rapport 
        $medocsQte = Offrir::join('medicament', 'offrir.MED_DEPOTLEGAL', '=', 'medicament.MED_DEPOTLEGAL')
            ->where('offrir.VIS_MATRICULE', $id)
            ->get();
        
            return view("rapport", ["rapports" => $rapports, "medocsQte" => $medocsQte]);
        }

    // PraticienRapport
    public function rapportVisiteur()
    {
        $praticiens = Praticien::all();
        $medocs = Medicament::all();

        return view("nouveauRapport", ["praticiens" => $praticiens, "medocs" => $medocs]);        
    }

    // NouveauRapport
    public function store(Request $request)
    {
        //VALIDATE RAPPORT
        $request->validate([
            'praticien' => ['required', 'string'],
            'date' => ['required', 'date'],
            'bilan' => ['required', 'string'],
            'motif' => ['nullable', 'string'],
            ['medocs' => ['nullable', 'string']],
            ['qte' => ['nullable', 'int']],
        ]);

        // Rapport store

        // dd($request);
        $rapport = new Rapport();
        $rapport->VIS_MATRICULE = auth()->user()->VIS_MATRICULE;
        $rapport->PRA_NUM = $request->praticien;
        $rapport->RAP_DATE = $request->date;
        $rapport->RAP_BILAN = $request->bilan;
        $rapport->RAP_MOTIF = $request->motif;
        $rapport->save();

        // FLASH 
        session()->flash('success', 'Rapport ajouté avec succès');

        //Recup first RAP_NUM with order by desc
        $lastRapport = Rapport::orderByDesc("RAP_NUM")->first();


        // Médicaments store
        if ($request->qte1 != 0 && $request->qte2 !=0) {
            $medoc = new Offrir();
            $medoc->VIS_MATRICULE = $rapport->VIS_MATRICULE;
            $medoc->RAP_NUM = $lastRapport->RAP_NUM;
            $medoc->MED_DEPOTLEGAL = $request->medoc1;
            $medoc->OFF_QTE = $request->qte1;
            $medoc->save();
            $medoc = new Offrir();
            $medoc->VIS_MATRICULE = $rapport->VIS_MATRICULE;
            $medoc->RAP_NUM = $lastRapport->RAP_NUM;
            $medoc->MED_DEPOTLEGAL = $request->medoc2;
            $medoc->OFF_QTE = $request->qte2;
            $medoc->save();
        } elseif ($request->qte1 != 0) {
            $medoc = new Offrir();
            $medoc->VIS_MATRICULE = $rapport->VIS_MATRICULE;
            $medoc->RAP_NUM = $lastRapport->RAP_NUM;
            $medoc->MED_DEPOTLEGAL = $request->medoc1;
            $medoc->OFF_QTE = $request->qte1;
            $medoc->save();
        } elseif ($request->qte2 != 0) {
            $medoc = new Offrir();
            $medoc->VIS_MATRICULE = $rapport->VIS_MATRICULE;
            $medoc->RAP_NUM = $lastRapport->RAP_NUM;
            $medoc->MED_DEPOTLEGAL = $request->medoc2;
            $medoc->OFF_QTE = $request->qte2;
            $medoc->save();
        }

        return redirect('/rapport');
    }
    public function search()
    {
        $res = request()->input('resa');
        $nom = request()->input('nom');
        // dd($nom);
        $prenom = request()->input('prenom');
        // dd($prenom);
        $ville = request()->input('ville');
        // dd($ville);

        if ($nom != NULL) {
            $searchPra = Praticien::where('VIS_NOM', 'like', "$nom%")
            ->get();
        } elseif ($prenom != NULL) {
            $searchPra = Praticien::where('Vis_NOM', 'like', "$prenom%")
            ->get();
        } elseif ($ville != NULL) {
            $searchPra = Praticien::where('VIS_ADRESSE', 'like', "$ville%")
            ->get();
        } else {
            $res = "";
            $searchPra = Praticien::where('VIS_NOM', 'like', "$res%")
            ->get();
        }
        
        return view('praticien')->with('praticiens', $searchPra);
    }
}
