@extends('layouts.app')

@section('content')
    {{-- @if(Auth::user()->role === 'admin')
    <h1><a href="{{route('users.index')}}">La liste de tout les  Utulisateurs connecter</a></h1><br>
    <h1><a href="{{ route('users.index') }}"></a></h1><br>
    @elseif(Auth::user()->role === 'client')

        <script>window.location = "{{ route('profils.create') }}";</script>

        <!-- Afficher le contenu pour les clients -->
        {{-- <h1><a href="{{ route('profils.index') }}">Voir Mon Profil</a></h1><br> --}}
        {{-- <h1><a href="{{ route('profils.create') }}">Créer Mon Profil en tant que client</a></h1><br> --}}
         {{-- Redirection vers le formulaire de création de profil pour les clients --}}
        {{-- <h1><a href="{{ route('produits.index') }}">Voir La liste de Mes Produits</a></h1><br>
        <h1><a href="{{ route('categories.index') }}">Les catégories de mon Produit</a></h1><br> --}}
    {{-- @endif  --}}

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Tableau de bord
                    </div>
                    <div class="card-body">
                        @if(Auth::user()->role === 'admin')
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('users.index') }}">Liste des Utilisateurs</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories.index') }}">Catégories de Produits</a>
                            </li>
                        </ul>
                        @elseif(Auth::user()->role === 'client')
                        <p>Bienvenue, {{ Auth::user()->name }}</p>
                        <p>Veuillez créer votre profil :</p>
                        <a href="{{ route('profils.create') }}" class="btn btn-primary">Créer Mon Profil</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Contenu principal du tableau de bord -->
                <h1>Contenu Principal</h1>
                <!-- Ajoutez ici le contenu spécifique à votre tableau de bord -->
            </div>
        </div>
    </div> --}}
    {{-- @endsection --}}
    


{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Auth::user()->role === 'admin')
                    <h3>Tableau de bord administrateur</h3>
                    <p>Bienvenue, {{ Auth::user()->name }}</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Liste de tous les utilisateurs</a> 
                     <a href="{{ route('categories.index') }}" class="btn btn-primary">Catégories de Produits</a>
                    @elseif(Auth::user()->role === 'client')
                    <h3>Tableau de bord CLIENT</h3>
                    <p>Bienvenue, {{ Auth::user()->name }}</p>
                    <div class="btn-group" role="group">
                        <a href="{{ route('profils.create') }}" class="btn btn-primary">Veuillez creer Obligatoire Votre Profil</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
