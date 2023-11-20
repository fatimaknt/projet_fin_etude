<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show( String $id){
        $produit= Produit::find($id);
        return view('show.index',compact('produit'));
    }
    //Afficher le panier
    public function panier(Request $request)
    {
        $produit = Produit::find($request->produit_id);
    
        // Rechercher le produit dans le panier
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->produit_id;
        });
    
        // Si le produit est déjà dans le panier, affichez un message
        if ($duplicata->isNotEmpty()) {
            return redirect()->route('welcome')->with("success", "Le produit a déjà été ajouté au panier.");
        }
    
        // Ajouter le produit au panier
        Cart::add($produit->id, $produit->nom, 1, $produit->prix)->associate('App\Produit');
    
        return redirect()->route('welcome')->with("success", "Le produit a été ajouté au panier.");
    }
    }
