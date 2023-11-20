@extends('layouts.app')

@section('content') 
<div class="container">
    <form method="POST" action="{{ route('categories.update', $categorie->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="libelle">Libelle</label>
            <input type="text" name="libelle" class="form-control" placeholder="Entrer le libelle" value="{{ $categorie->libelle }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier la catégorie</button>
    </form>
</div>
@endsection
