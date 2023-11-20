<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

    // app/Http/Controllers/PanierController.php

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
    use App\Http\Controllers\Controller;
    use App\Models\Produit;

    
class PanierController extends Controller
{

        //affichage du contenu de mon panier
        public function index()
        {
            $contenuPanier = Cart::content();
            $total = Cart::total();
            
            return view('cart.index', compact('contenuPanier', 'total'));
        }

        
    //methode ajout
    public function panier(Request $request)
    {
        $id = $request->input('id');
        $produit = Produit::find($id);
    
        if (!$produit) {
            return redirect()->route('produits.index')->with("Le produit que vous essayez d'ajouter au panier n'existe pas.");
        }
    
        $prix = (float) $produit->prix; // Assurez-vous que le prix est un nombre flottant
        if ($prix <= 0) {
            return redirect()->route('produits.index')->with("Le prix du produit n'est pas valide.");
        }
    
        Cart::add([
            'id' => $produit->id,
            'name' => $produit->nom,
            // 'photo' => $produit->photo,
            'price' => $prix,
            'qty' => 1,
        ]);
        return view('welcome')->with("Votre produit a été ajouté au panier.");
    }
        
//mettre a jour mon panier
// public function mettreAJourQuantite(Request $request, $rowId)
// {
//     Cart::update($rowId, $request->quantity);
//     return redirect()->route('mettreAJourQuantite', ['rowId' => $rowId])->with("Quantité mise à jour avec succès.");
// }
     

    //suppression de mon panier
    public function supprimerDuPanier($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with("Produit supprimé du panier.");
    }
}


// 