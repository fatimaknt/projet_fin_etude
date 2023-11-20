<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @extends('layouts.app')
    @section('content')

   @if(Auth::user()->profils()->where('name', 'admin')->exists())
        <h1><a href="{{route('users.index')}}">La liste de tout les  Utulisateurs connecter</a></h1><br>
        {{-- <h1><a href="{{route('eleveurs.index')}}">La liste des Utulisateurs</a></h1><br> --}}
   {{-- @elseif(Auth::user()->profils()->where('name', 'client')->exists())
   <h1><a href="{{route('eleveurs.create')}}">Creer Mon Profil</a></h1><br>
   <h1><a href="{{route('moutons.index')}}">Voir La liste de Mes Moutons</a></h1><br>
   <h1><a href="{{route('races.index')}}">Les races existant dans le monde</a></h1><br>
   @elseif(Auth::user()->profils()->where('name', 'client')->exists())
   <h1><a href="{{route('moutons.index')}}">Voir La liste de Mes Moutons</a></h1><br> --}}
   
{{-- @endif
@endsection --}} 
</body>
</html>