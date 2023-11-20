<?php

namespace App\Models;
use App\Models\User;
use App\models\Recherche;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    public function recherches(){
        return $this->belongsToMany(Recherche::class);  
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function utilisateurs()
        {
            return $this->belongsToMany(User::class, 'profil_user');
        }
    
        public function produits(){
            return $this->hasMany(Produit::class,"produit_id");
        }

     public function user1()
        {
            return $this->belongsTo(User::class,'id', 'user_id');
        }

    }
