<?php


namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\CategoriesProduit;
use App\Models\Produit;

class CategorieProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::all();
        $categorie=Categorie::all();
        $catego=CategoriesProduit::all();
        dd($catego);
        return view('cateprod.index', compact('catego','produits','categorie'));
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cateprod.index'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie_id'=>'required',
            'produit_id'=>'required',
          ]);

          $categoProd=new CategoriesProduit();
          $categoProd->categorie_id=$request->categorie_id;
          $categoProd->produit_id=$request->produit_id;
          $categoProd->save();
          return view('cateprod.index', compact('categoProd'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoProd = CategoriesProduit::findOrFail($id);
        return view('cateprod.show', compact('categoProd'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoProd=CategoriesProduit::findOrFail($id);
        
        return view('categoProd.edit', compact('categoProd'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorie_id'=>'required',
            'produit_id'=>'required',
          ]);

          $categoProd=CategoriesProduit::find($id);
        //dd($user);
          $categoProd->categorie_id=$request->categorie_id;
          $categoProd->produit_id=$request->produit_id;
          $categoProd->save();
          return view('cateprod.index', compact('categoProd'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoProd=CategoriesProduit::find($id);
        if ($categoProd) {
            $categoProd->delete();
            return redirect()->route('cateprod.index')
                ->with('success', 'categories des produits supprimé avec succès');
        } else {
            return redirect()->route('cateprod.index')
                ->with('error', 'Le categories des produits n\'existe pas');
        }

    }
}
