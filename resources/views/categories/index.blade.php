<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    @extends('layouts.app')
    @section('content') 

    <div class="container mt-4">
        <h1 class="mb-4">Liste des Catégories</h1>
        
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une Catégorie</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                <tr>
                    <th scope="row">{{ $categorie->id }}</th>
                    <td>{{ $categorie->libelle }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-info btn-sm">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('home') }}" class="btn btn-secondary">Retour</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    @endsection
</html>
