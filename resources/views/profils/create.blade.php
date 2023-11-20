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
    <form method="POST" action="{{route('profils.store')}}" enctype="multipart/form-data">
        @csrf

    <label for="prenom">Prenom:</label>
    <input type="text" name="prenom" placeholder="entrer votre prenom"><br><br><br>

    <label for="nom">Nom:</label>
    <input type="text" name="nom" placeholder="entrer votre nom"><br><br><br>

    <label for="adresse">Adresse</label>
    <input type="adresse" name="adresse" placeholder="entrer l adresse"><br><br><br>

    <label for="photo">Photo:</label>
    <input type="file" name="photo"><br><br><br>



    <label for="langue">Choisissez Votre langue</label>
    <select name="langue" id="langue">
        <option value="Francais">Francais</option>
        <option value="Anglais">Anglais</option>

    </select><br><br>
    <label for="number">Numero Tel:</label>
    <input type="number" name="number" placeholder="entrer votre num"><br><br><br>

    <label for="user_id">User</label>
    <select name="user_id" id="user_id">
        <option value="{{ $user}}">{{ auth()->user()->name }}</option>

    </select><br><br><br>
    <input type="submit" value="Creer Votre Profil">
    </form>
    @endsection
</body>
</html>