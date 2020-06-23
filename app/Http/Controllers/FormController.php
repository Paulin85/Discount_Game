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
        $formulaire->nom = $request->get('Nom');
        $formulaire->note = $request->get('Note');
        $formulaire->commentaire = $request->get('Commentaire');
        $formulaire->product_id = $request->get('product_id');

        $formulaire->save();
        return redirect()->route('products.index');
    }

    
}
