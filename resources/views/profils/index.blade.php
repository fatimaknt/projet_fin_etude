<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content') 
    <div class="container">

    {{-- {{Auth::user()->name}} --}}
    <h2>Votre Profil</h2>
    <table border="2px">
        @foreach ($profils as $profil)
        <div class="col-md-4 mb-4">
            <div class="card">
            <img src="{{asset('storage/' .$profil->photo) }}" alt="Photo du profil">
            <hr>
            <div class="card-body">
            <h5 class="card-title">Prenom: {{ $profil->prenom }} </h5>
            <h5 class="card-title">Nom: {{ $profil->nom }}</h5>
            <h5 class="card-title">Adresse: {{$profil->adresse}}</h5>
            <h5 class="card-title">Langue: {{$profil->langue}}</h5>
            <h5 class="card-title">Num_tel: {{$profil->number}}</h5>
            <h5 class="card-title">Nom_utulisareur: {{$profil->user->name }}</h5>
            <div class="btn-group" role="group">
                <a href="{{ route('profils.edit', $profil->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('profils.destroy', $profil->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>

            @endforeach
        </table>
        <td><a href="{{route('welcome')}}">Retour a la page d'Accueil</a></td> 
        @endsection
    </body>
    </html>