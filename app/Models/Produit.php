<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany(User::class,"user_id");
    }
    //Relation 1-n entre user et produit
    public function users()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    

    // public function categorie(){
    //     return $this->belongsToMany(Categorie::class);  
    // }

    // public function profil()
    // {
    //     return $this->belongsTo(Profil::class, "profil_id"); 
    // }

    // public function profils()
    // {
    //     return $this->belongsTo(User::class, 'profil_id'); 
    // }

    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function getPrice(){
        $prix =$this->prix/100;
        return number_format($prix,2,'',' ') .'£';
    }
}
