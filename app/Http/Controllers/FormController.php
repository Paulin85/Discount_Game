<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formulaire;

class FormController extends Controller
{
    public function formulaire(){
        return view('formulaire');
    }

    public function store(Request $request)
    {
        $formulaire = new Formulaire();
        $formulaire->nom = $request->get('nom');
        $formulaire->note = $request->get('note');
        $formulaire->commentaire = $request->get('commentaire');
        $formulaire->products_id = $request->get('products_id');

        $formulaire->save();
        return redirect()->route('products.index');
    }
    //
}
