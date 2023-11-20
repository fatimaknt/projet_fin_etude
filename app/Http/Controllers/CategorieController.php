<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //POUR LA PAGE ADMIN
    public function index()
    {
        $categories=Categorie::all();
        return view('categories.index', compact('categories'));
    }

    //POUR CLIENT
    public function client()
    {
        $categories=Categorie::all();
        return view('welcome', compact('categories'));
    }

    
    
//POUR LA PAGE ACCUEIL
    public function categorie()
    {
        $categories=Categorie::all();
        return view('welcome', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $categorie = new Categorie();

        $categorie->libelle = $request->libelle;
        $categorie->save();
        return redirect()->route('categories.index', ['categorie' => $categorie])
            ->with('success', 'Catégorie créée avec succès');
    }


    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required',

        ]);
        $categorie= Categorie::find($id);
        $categorie->libelle = $request->libelle;
        $categorie->save();
        return redirect()->route('categories.index')->with('success','categories creer avec succes');
    }
    

    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    // ...


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories=Categorie::find($id);
        if ($categories) {
            $categories->delete();
            return redirect()->route('categories.index')
                ->with('success', 'categories supprimé avec succès');
        } else {
            return redirect()->route('categories.index')
                ->with('error', 'Le categories n\'existe pas');
        }

    }
}
