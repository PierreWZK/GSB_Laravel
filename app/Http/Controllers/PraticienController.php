<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Praticien;

class PraticienController extends Controller
{
    public function liste()
    {
        $praticiens = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->get();
        // $typePra = TypePraticien::all();       
        return view("praticien", ["praticiens" => $praticiens]);
    }

    public function search(Request $request)
    {
        $res = request()->input('resa');
        $q = request()->input('q');
        $ville = $request->ville;
        $type = $request->type;
        // dd($request);

        if ($q != NULL && $ville != NULL && $type != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_NOM', 'like', "$q%")
            ->Where('PRA_VILLE', 'like', "$ville%")
            ->Where('type_praticien.TYP_CODE', 'like', "$type%")
            ->get();
        } elseif ($q != NULL && $ville != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_NOM', 'like', "$q%")
            ->Where('PRA_VILLE', 'like', "$ville%")
            ->get();
        } elseif ($ville != NULL && $type != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_VILLE', 'like', "$ville%")
            ->Where('type_praticien.TYP_CODE', 'like', "$type%")
            ->get();
        } elseif ($q != NULL && $type != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_NOM', 'like', "$q%")
            ->Where('type_praticien.TYP_CODE', 'like', "$type%")
            ->get();
        } elseif ($q != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_NOM', 'like', "$q%")
            ->get();
        } elseif ($ville != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_VILLE', 'like', "$ville%")
            ->get();
        } elseif ($type != NULL) {
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('type_praticien.TYP_CODE', 'like', "$type%")
            ->get();
        } else {
            $res = "";
            $praticien = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
            ->Where('PRA_NOM', 'like', "$res%")
            ->get();
        }
        return view('praticien')->with('praticiens', $praticien);
    }
}
