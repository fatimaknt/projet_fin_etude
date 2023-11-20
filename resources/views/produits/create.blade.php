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

    <form method="POST" action="{{route('produits.store')}}" enctype="multipart/form-data">
        @csrf

    <label for="nom">Nom</label>
    <input type="text" name="nom" placeholder="entrer le nom"><br><br><br>


    <label for="description">Discription</label>
    <textarea name="description" id="" cols="30" rows="10"></textarea><br><br><br>

    <label for="taille">Taille</label>
    <input type="number" name="taille" placeholder="entrer la taille"><br><br><br>



    <label for="photo">Photo:</label>
    <input type="file" name="photo"><br><br><br>

    <label for="image">image:</label>
    <input type="file" name="image"><br><br><br>

    <label for="imagephoto">imagephoto:</label>
    <input type="file" name="imagephoto"><br><br><br>

    
    <label for="prix">Prix</label>
    <input type="number" name="prix" placeholder="entrer le prix"><br><br><br>
    

    <label for="etats">Etat</label>
    <input type="text" name="etats" placeholder="entrer l etat"><br><br><br>
    

    <label for="date_ajout">date_ajout</label>
    <input type="date" name="date_ajout" placeholder="entrer l date_ajout"><br><br><br>
   
    <label for="user_id">Vous etes : </label>
    <select name="user_id" id="user_id">
        <option value="{{$userId}}">{{ auth()->user()->name }}</option>
    </select><br><br><br>
    <label for="categories_id">Categories</label>
    <select name="categories_id" id="categories_id">
        @foreach ($categories as $categorie)
        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
        @endforeach
    </select><br><br>

    <input type="submit" value="Publier">
    </form>
    @endsection
</body>
</html>