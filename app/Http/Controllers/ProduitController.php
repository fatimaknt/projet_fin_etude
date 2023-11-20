<?php

namespace App\Http\Controllers;
use Hardevine\Cart\Facades\CartFacade as Cart;

use App\Models\CategoriesProduit;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function index()
    {
        // Récupérez l'utilisateur connecté
        $user = auth()->user()->id; 
         // Récupérez les produits de cet utilisateur
         $produits = Produit::where('user_id', $user)->get();
    
        // $produits = $user->produits;
    
        return view('produits.index', compact('produits','user'));
    }
    
    public function indexP()
    {
        //la liste des produit d'une seule profil
        $produits = Produit::all(); // Récupérer tous les produits
        return view('produits.index', compact('produits')); 
    }


    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produit = Produit::all();
        $userId = auth()->user()->id;   
        // $profil = Profil::where('user_id', $userId)->get();
        $categories = Categorie::all();
        return view('produits.create', compact('categories','userId','produit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'taille' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imagephoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required',
            'etats' => 'required',
            'date_ajout' => 'required',
            'user_id' => 'required',
            'categories_id' => 'required',
        ]);
    
        // Créez une instance de Produit et attribuez les valeurs des champs
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->taille = $request->taille;
        $imagePath=null;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('image', 'public');
        }
        $imagePath2=null;
        if ($request->hasFile('image')) {
            $imagePath2 = $request->file('image')->store('image2', 'public');
        }
        $imagePath3 = null;

        if ($request->hasFile('imagephoto')) {
            $imagePath3 = $request->file('imagephoto')->store('image3', 'public');
        }   
        $produit->photo=$imagePath;
        $produit->image=$imagePath2;
        $produit->imagephoto = $imagePath3;
        $produit->prix = $request->prix;
        $produit->etats = $request->etats;
        $produit->date_ajout = $request->date_ajout;
        $produit->user_id = $request->user_id;
        $produit->categories_id = $request->categories_id;
        $produit->save();
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
    }



        public function show(string $id)
    {
        $produit = Produit::findOrFail($id);
        // Accédez à la catégorie associée au produit en utilisant la relation "categorie"
        $categorie = $produit->categories;
    
        return view('produits.show', compact('produit', 'categorie'));
    }


    public function showApp(string $id)
    {
        $produits = Produit::findOrFail($id);
        // $categories=CategoriesProduit::all();
        $categorie=Categorie::findOrFail($id);
        return view('show', compact('produits','categorie'));

    }
//page d'acccueil
    public function welcomes(){
    // $user = auth()->user()->id;   
    // $profils = Profil::where('user_id', $user)->get();
    // $produit= Produit::find($id);
    $produits=Produit::all();
    $categories=Categorie::all();
    
    return view('welcome', compact('produits','categories'));
    }

    //BOUTON ACHETER
    public function achat(){
        return view('produits.acheter');
    }
    
    //BUTTON MARCHANDER
    public function marchander(){
        return view('produits.marchander');
    }


    //Button rechercher
    public function rechercher(Request $request){
        $recherche=$request->input('rechercher');
        //rechercher en fonction du nom de produit
        $produits=Produit::where('nom','like',"%$recherche%")->get();
        return view('welcome',compact('produits'));
    }
   
    

    // public function panier(Request $request)
    // {
    //     $produit = Produit::find($request->id); // Remplacez par la façon dont vous récupérez un produit (id) depuis votre base de données
    
    //     if (!$produit) {
    //         return redirect()->route('produits.index')->with("Le produit que vous essayez d'ajouter au panier n'existe pas.");
    //     }
    
    //     Cart::add([
    //         'id' => $produit->id,
    //         'name' => $produit->name,
    //         'price' => $produit->price,
    //         'quantity' => 1,
    //     ]);
    
    //     return redirect()->route('produits.index')->with("Votre produit a été ajouté au panier.");
    // }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $produits=Produit::findOrFail($id);
            $users = auth()->user()->id;  
            // $users=User::all();
            $categories=Categorie::all();
            return view('produits.edit', compact('produits', 'users','categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'taille' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imagephoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required',
            'etats' => 'required',
            'date_ajout' => 'required',
            'user_id' => 'required',
            'categories_id' => 'required',

          ]);
        
          $produits= Produit::find($id);
          $produits->nom = $request->nom;
          $produits->description = $request->description;
          $produits->taille = $request->taille;
          $imagePath=null;
          if ($request->hasFile('photo')) {
              $imagePath = $request->file('photo')->store('image', 'public');
              }
              $imagePath=null;
              if ($request->hasFile('image')) {
                  $imagePath = $request->file('image')->store('image2', 'public');
                  }
                  $imagePath=null;
                  if ($request->hasFile('imagephoto')) {
                      $imagePath = $request->file('imagephoto')->store('image3', 'public');
                      }            
          $produits->photo=$imagePath;
          $produits->image=$imagePath;
          $produits->imagephoto=$imagePath;
          $produits->prix = $request->prix;
          $produits->etats = $request->etats;
          $produits->date_ajout = $request->date_ajout;
          $produits->user_id = $request->user_id;
          $produits->categories_id = $request->categories_id;
        $produits->save();
          return redirect()->route('produits.index')->with('success','Produit creer avec succes');
    

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits=Produit::find($id);
        if ($produits) {
            $produits->delete();
            return redirect()->route('produits.index')
                ->with('success', 'produit supprimé avec succès');
        } else {
            return view('welcome');
                
        }
    }

    }

