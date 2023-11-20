<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Detail des Produits</h1>
<hr> 
 <img src="{{asset('storage/' .$produits->photo) }}" alt="Photo du race">
    <hr>
    <td>Discription Produit : {{$produits->description}}</td><br>
    <td>Prix Produit : {{$produits->prix}}</td><br>
    <td>Nombre de Vue : {{$produits->nombre_vue}}</td><br>
    <hr>
    <br>
    <td>Nom utulisateur : {{$produits->user->name}}</td><br>
     Email Utulisateur : <span>{{$produits->user->email}} </span><br>
<hr>
     <p>Nom Du Categorie Produit:  {{ $categorie->libelle }} </p><br>
     <td><a href="{{route('produits.index')}}">Retour sur la liste des produits</a></td> 
 
</body>