<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;   
        $profils = Profil::where('user_id', $user)->get();
        $produits=Produit::all();
        $categories=Categorie::all();
        return view('profils.index',compact('profils','user','produits','categories'));
    }

    //function du page accueil
    public function welcome(){
        $user = auth()->user()->id;   
        $profils = Profil::where('user_id', $user)->get();
        $produits = Produit::all(); // Assurez-vous que $produits est correctement défini
        $categories=Categorie::all();
        return view('welcome', compact('profils', 'produits','categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
//     public function create()
// {
//     $user = auth()->user()->id;
//     $profils = Profil::where('user_id', $user)->get();
//     $produits = Produit::all();
//     $categories=Categorie::all();
//     return view('welcome', compact('profils', 'produits','categories'));
// }

public function create()
{
    $user = auth()->user()->id;
    $profils = Profil::where('user_id', $user)->get();
    $produits = Produit::all();
    $categories = Categorie::all();
    return view('profils.create', compact('profils', 'produits', 'categories','user'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'adresse'=>'required',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'langue'=>'required',
            'number'=>'required',
            'user_id'=>'required',
          ]);
        
          $profils=new Profil();
      
          $profils->prenom=$request->prenom;
          $profils->nom=$request->nom;
          $profils->adresse=$request->adresse;


          $imagePath=null;
          if ($request->hasFile('photo')) {
              $imagePath = $request->file('photo')->store('image', 'public');
              }
          $profils->photo=$imagePath;
          $profils->langue=$request->langue;
          $profils->number =$request->number;
          $profils->user_id=$request->user_id;
          $profils->save();
          //AFFICHAGES DES PRODUITS ET CATEGORIES
          $user = auth()->user()->id;
          $profils = Profil::where('user_id', $user)->get();
          $produits = Produit::all();
          $categories = Categorie::all();

          return view("welcome", compact('profils', 'produits', 'categories','user'));
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profils = Profil::findOrFail($id);
        return view('profils.show', compact('profils'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profils=Profil::findOrFail($id);
        $users=User::all();
        return view('profils.edit', compact('profils', 'users'));

    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'adresse'=>'required',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'langue'=>'required',
            'number'=>'required',
            'user_id'=>'required',
        ]);
    
        $profils = Profil::find($id);
        $profils->prenom=$request->prenom;
        $profils->nom=$request->nom;
        $profils->adresse=$request->adresse;


          $imagePath=null;
          if ($request->hasFile('photo')) {
              $imagePath = $request->file('photo')->store('image', 'public');
              }
        $profils->photo=$imagePath;
        $profils->langue=$request->langue;
        $profils->number =$request->number;
        $profils->user_id=$request->user_id;
        $profils->save();
    
        return redirect()->route('profils.index')->with('success', 'Profil mis à jour avec succès');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profils=Profil::find($id);
        if ($profils) {
            $profils->delete();
            return redirect()->route('profils.index')
                ->with('success', 'profils supprimé avec succès');
        } else {
            return redirect()->route('profils.index')
                ->with('error', 'Le profils n\'existe pas');
        }

    }
}
