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

    <form method="POST" action="{{route('users.store')}}"enctype="multipart/form-data">
    @csrf
    <label for="name">Nom</label>
    <input type="text" name="name" placeholder="entrer le nom"><br><br><br>        
   
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="entrer l email"><br><br><br>

    <label for="profil">Profil</label>
    <select name="profil" id="profil">
        <option value="Administrateur">Administrateur</option>
        <option value="Client">Client</option>
    </select>
<br><br>
    <input type="submit" value="Ajouter Utulisateur">
    </form>
@endsection
</body>
</html>