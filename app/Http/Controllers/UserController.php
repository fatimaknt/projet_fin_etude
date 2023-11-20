<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
       
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'profil'=>'required'
          ]);

          $user=new User();
        //dd($user);
          $user->name=$request->name;
          $user->email=$request->email;
          $user->password=$request->password;
          $user->profil=$request->profil;
          $user->save();
          return redirect()->route('users.index')->with('success','user creer avec succes');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $user = User::find($id);
     
        if ($user) {
            // Supprimez d'abord les enregistrements liés dans la table pivot 'mouton_users'
    
            // Ensuite, supprimez l'utilisateur
            $user->delete();
    
            return redirect()->back()->with("utilisateur supprimé avec succès");
        } else {
            return redirect()->route('users.index')->with('error', "L'utilisateur n'existe pas");
        }

    }
    //Partie bloquer

    public function bloquer(string $id){
        $users=User::findOrFail($id);
        $users->is_blocked=0;
        $users->save();
        return back();
    }
    //partie Debloquer
    public function debloquer(string $id){
        $users=User::findOrFail($id);
        $users->is_blocked=1;
        $users->save();
        return back();
    }
    //RECHERCHER UTULISATEUR
    public function rechercherUser(Request $request)
    {
        $recherche = $request->input('recherche');
        $users = User::where('name', 'like', "%$recherche%")->get();
    
        return view('users.index', compact('users', 'recherche')); 
    }
    

}
