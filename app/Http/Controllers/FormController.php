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
        $formulaire->Nom = $request->get('nom');
        $formulaire->Note = $request->get('note');
        $formulaire->Commentaire = $request->get('commentaire');
        $formulaire->product_id = $request->get('product_id');

        $formulaire->save();
        return redirect()->route('products.index');
    }

    
}
