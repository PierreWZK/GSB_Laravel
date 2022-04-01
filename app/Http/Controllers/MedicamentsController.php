<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Medicament;

class MedicamentsController extends Controller
{
    public function liste()
    {
        $medicaments = Medicament::all();
        $medicament = Medicament::all()->first();
        
        return view("medicaments", ["medicament" => $medicament,"medicaments" => $medicaments]);
    }

    public function searchMedicaments(Request $request)
    {
        $res = request()->input('resa');
        $q = request()->input('q');
        $med = $request->med;
        // dd($request);

        if ($q != NULL && $med != NULL) {
            $medic = Medicament::where('MED_EFFETS', 'like', "%$q%")
            ->Where('MED_NOMCOMMERCIAL', 'like', "$med%")
            ->get();
        } elseif ($q != NULL) {
            $medic = Medicament::where('MED_EFFETS', 'like', "%$q%")
            ->get();
        } elseif ($med != NULL) {
            $medic = Medicament::where('MED_NOMCOMMERCIAL', 'like', "$med%")
            ->get();
        } else {
            $res = "";
            $medic = Medicament::where('MED_EFFETS', 'like', "$res%")
            ->get();
        }
        return view('medicaments')->with('medicaments', $medic);
    }
}
