<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    protected $table="formulaire";

    public $timestamps = false;

    protected $fillable=['Nom', 'Note', 'Commentaire', 'product_id'];
    //

    public function product()
        { 
            return $this->belongsTo(Product::class); 
        }
}
