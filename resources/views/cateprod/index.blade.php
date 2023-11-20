<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body>
        @extends('layouts.app')
        @section('content') 
    
     <td><a href="{{route('categProduit.create')}}">Ajoutez Des Categories de Produit</a></td> 

    <table border="2px">
        <tr>
            <th>Numero</th>
            <th>Categorie</th>
            <th>Produit</th>
            <th colspan="3">Action</th>
        </tr>
        @foreach ($categoProd as $categorie)
        <tr>
            <td>{{ $categorie->id }}</td>
            <td>{{ $categorie->categorie_id }}</td>
            <td>{{ $categorie->produit_id }}</td>


              {{-- <td> --}}
                {{-- @foreach($moutons->eleveur as $elev)
                  
                @endforeach   --}}
                {{-- Recuperation du cle etrangere --}}
                {{-- <span>{{ $moutons->eleveur->prenom }}</span> --}}
            {{-- </td>
            <td> --}}
                {{-- @foreach ($moutons->utulisateurs as $utulisateur)
                <span>{{$utulisateur->nom}}</span>
            @endforeach --}}
    
            <td><a href="{{route('cateprod.edit', $categorie->id)}}">Modifier</a></td>

            <td>
                <form action="{{route('cateprod.destroy', $categorie->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer"></td>
        </tr>
            @endforeach
        </table>
        <hr>
        @endsection
</body>
</html>