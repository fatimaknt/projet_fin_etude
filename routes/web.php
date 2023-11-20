<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategorieProduitController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Events\Message;
use App\Http\Controllers\ProfilGeneratorController;
use App\Models\Categorie;
use App\Models\CategoriesProduit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/', function () {
     return view('index');
 });

//  Route::post('/send-message',function(Request $request){
//    event(
//     new Message(
//       $request->input('username'),
//       $request->input('message')
//     )
//   );
//   return ["succes" => true];
//  });


 //openai
// Route::get('/open', function () {
//   $produits = Produit::all(); // Récupérer tous les produits
//   $categorie=Categorie::all();
//   $catego=CategoriesProduit::all();
//   return view('generate-profile',compact('produits','catego'));
// });
// Route::post('/generate-profile',ProfilGeneratorController::class)->name('profile-generator');

//Partie Admin
Route::resource('/users',UserController::class)->middleware(['auth','profil:admin']);
Route::get('/users/{user}/debloquer', [UserController::class, 'debloquer'])->name('debloquer');
Route::get('/users/{user}/bloquer', [UserController::class, 'bloquer'])->name('bloquer');
Route::get('/search', [UserController::class, 'rechercherUser'])->name('rechercherUser');

///Partie Client
  Route::resource('/produits',ProduitController::class)->middleware(['auth','profil:client']);
Route::resource('/categories',CategorieController::class)->middleware(['auth','profil:client']);
Route::resource('/categProduit',CategorieProduitController::class)->middleware(['auth','profil:client']);
Route::resource('/profils',ProfilController::class)->middleware(['auth','profil:client']);
// Route::get('/mesProduits', [ProduitController::class, 'index'])->name('produits.index');

//Partie welcome 
Route::resource('/',layoutController::class);
Route::get('/voir/{id}', [ProduitController::class, 'showApp'])->name('produits.showApp');
Route::get('/welcome', [ProfilController::class, 'welcome'])->name('welcome');
Route::get('/welcom', [ProduitController::class, 'welcomes'])->name('welcome');
Route::post('/achat', [ProduitController::class, 'achat'])->name('produits.acheter');
 Route::post('/panier', [CartController::class, 'panier'])->name('panier');
//VIDER LE PANIER
// Route::get('panier/{id}', [CartController::class, 'show'])->name('cart.show');
// Route::get('/videPanier', function ($id) {
//   $produit=Produit::find($id);
//  return view('cart.index',compact('produit'));
// })->name('cart.index');
Route::get('/voirPanier', [PanierController::class, 'index'])->name('index');
Route::get('/supprimerPanier/{rowId}', [PanierController::class, 'supprimerDuPanier'])->name('supprimerDuPanier');
Route::get('/marchander', [ProduitController::class, 'marchander'])->name('marchander');
Route::get('/rechercher', [ProduitController::class, 'rechercher'])->name('rechercher');
// Route::put('/panier/{rowId}', [VotreController::class, 'mettreAJourQuantite'])->name('mettreAJourQuantite');
//  Route::get('/catgori', [layoutController::class, 'cate'])->name('catego.cate');
// Route::get('show/{id}', [layoutController::class,'show']);

//PARTIE TCHAT
// Route::get('/show', [ChatController::class, 'show'])->name('chat.show');
//   Route::get('/chatify', [ChatController::class, 'index'])->name('chat.index');
//   Route::post('/chat/send', [ChatController::class, 'store']);
  // Route::middleware(['web'])->group(function () {
//   Auth::routes();

//   // ... d'autres routes web ...
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
