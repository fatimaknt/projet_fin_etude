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
    <td><a href="{{route('profils.index')}}">Retour Affichage Profil</a></td> 

    <form method="POST" action="{{route('profils.update',$profils->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" placeholder="entrer votre prenom"  value="{{$profils->prenom}}"><br><br><br>
    
        <label for="nom">Nom:</label>
        <input type="text" name="nom" placeholder="entrer votre nom"  value="{{$profils->nom}}"><br><br><br>
    
        <label for="adresse">Adresse</label>
        <input type="adresse" name="adresse" placeholder="entrer l adresse"  value="{{$profils->adresse}}"><br><br><br>
        <label for="photo">Photo:</label>
        
        <label for="photo">Photo:</label>
        <input type="file" name="photo" value="{{$profils->photo}}"><br><br><br>

        
        <label for="langue">Langue:</label>
        <select name="langue" id="langue">
            <option value="francais" {{ $profils->langue === 'francais' ? 'selected' : '' }}>Français</option>
            <option value="anglais" {{ $profils->langue === 'anglais' ? 'selected' : '' }}>Anglais</option>        </select><br><br>
    
    <label for="number">Numero Tel:</label>
    <input type="number" name="number" placeholder="entrer le nombre_vue" value="{{$profils->number}}"><br><br><br>
   
    <label for="user_id">User</label>
    <select name="user_id" id="user_id">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach      
    </select><br><br><br>
    <input type="submit" value="Modifier Votre Profil">
    </form>
    @endsection
    <H5><a href=""></a></H5>
</body>
</html>