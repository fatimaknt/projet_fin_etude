<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de Produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 0px 5px 0px #ccc;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content') 
    <div class="container">

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
        <h1>La liste de Mes Produits</h1>
        <h1><a href="{{route('produits.create')}}">Ajoutez Des Produits</a></h1>
        <table border="2">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Taille</th>
                    <th>Photo1</th>
                    <th>Photo2</th>
                    <th>Photo3</th>
                    <th>Prix</th>
                    <th>État</th>
                    <th>Date d'Ajout</th>
                    <th>Proprietaire Produit</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($produits)
                @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->taille }}</td>
                    <td><img src="{{asset('storage/' .$produit->photo) }}" alt="Photo du produit"></td>
                    <td> <img src="{{asset('storage/' .$produit->image) }}" alt="Photo du profil"></td>
                    <td><img src="{{asset('storage/' .$produit->imagephoto) }}" alt="Photo du profil"></td>
                    <td>{{ $produit->prix }}</td>
                    <td>{{ $produit->etats }}</td>
                    <td>{{ $produit->date_ajout }}</td>
                   
                    <td>{{  $produit->users->name  }}{{ $produit->users->prenom}}</td>
                    <td><a href="{{route('produits.show', $produit->id)}}">Voir Plus</a></td>
                    <td><a href="{{route('produits.edit', $produit->id)}}" class="btn btn-success">Modifier</a></td>
                    <td>
                        <form action="{{route('produits.destroy', $produit->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9">Vous avez ajouter aucun produit !!!.</td>
                </tr>
            </tbody>
            @endif
        </table><br><br>
        <button class="btn btn-dark">
            <a href="{{route('welcome')}}" style="text-decoration: none; color: white;">Retour sur la page d'accueil</a>
        </button>
    </div>
    @endsection
   
</body>
</html>
