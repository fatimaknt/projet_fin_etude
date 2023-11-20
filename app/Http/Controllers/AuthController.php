<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }



//fonction login
    public function login(Request $request)
    {
        // Validez les données de connexion
       
    
        // Tentez de connecter l'utilisateur
        if (!Auth::attempt($request->only('email', 'password'))) {
            // L'authentification a échoué
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }
    
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
    
        return response([
            'token' => $token
        ]);
    }


//fonction user
    public function register(Request $request)
    {
        // Validez les données d'inscription
      

        // Créez un nouvel utilisateur
       $user= User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Connectez l'utilisateur après l'inscription
        Auth::attempt($request->only('email', 'password'));

        // Redirigez l'utilisateur vers le tableau de bord ou la page de profil
        
    }
}
