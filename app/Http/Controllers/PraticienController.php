<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Praticien;

class PraticienController extends Controller
{
    public function liste()
    {
        $praticiens = Praticien::all();
        $praticien = Praticien::all()->first();
        
        return view("praticien", ["praticien" => $praticien,"praticiens" => $praticiens]);
    }

    public function search(Request $request)
    {
        $res = request()->input('resa');
        $q = request()->input('q');
        $ville = $request->ville;
        // dd($request);

        if ($q != NULL && $ville != NULL) {
            $praticien = Praticien::where('PRA_NOM', 'like', "$q%")
            ->Where('PRA_VILLE', 'like', "$ville%")
            ->get();
        } elseif ($q != NULL) {
            $praticien = Praticien::where('PRA_NOM', 'like', "$q%")
            ->get();
        } elseif ($ville != NULL) {
            $praticien = Praticien::where('PRA_VILLE', 'like', "$ville%")
            ->get();
        } else {
            $res = "";
            $praticien = Praticien::where('PRA_NOM', 'like', "$res%")
            ->get();
        }
        return view('praticien')->with('praticiens', $praticien);
    }
}
