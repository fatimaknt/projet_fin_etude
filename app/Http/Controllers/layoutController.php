<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class layoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //POUR AFFICHER TOUT LES PRODUIT ET CATEGORIES DANS LA PAGE ACCUEIL
    public function index()
    {
        $produits = Produit::all();
        $categories = Categorie::all();

        // $userId = null;

        // if (auth()->check()) {
        //     $userId = auth()->user()->id;
        // }

        return view('welcome', compact('produits', 'categories'));
    }
       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //voir plus du produit dans la page accueil
    public function show(string $id)
    {
        $produits = Produit::findOrFail($id);
        // $categories=CategoriesProduit::all();
        $categorie=Categorie::findOrFail($id);
        return view('produits.show', compact('produits','categorie'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
