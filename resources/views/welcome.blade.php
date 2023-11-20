    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            .card{
                width: auto;
                height: auto ;
            }
            .card img{
                width: auto;
                height: 500px;
            }
        </style>
    </head>
    <body>
    <!-- ... Votre code existant ... -->

    <!-- ... Votre code HTML existant ... -->

    <div style="background-color: rgb(255, 247, 247);">

        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">

            <div class="container">
                <a class="navbar-brand" href="#">
                    <div class="rounded-circle" style="width: 50px; height: 50px; overflow: hidden;" style="margin-left: 0%;">
                        <img src="/storage/image/logo.jpg" alt="Bootstrap" width="50" height="50" style="object-fit: cover;">
                    </div>
                </a>
                <nav class="navbar navbar-expand-lg navbar-dark justify-content-between justify-content-end">
                    <div class="container-fluid">
                        <a class="text-muted" href="{{route('index')}}" style="margin-right: 10px;">Voir MonPanier <span class="badge badge-pill badge-white">{{Cart::count()}}</span></a>
            
                    <a class="nav-link active text-white" href="#">A propos</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white" aria-current="page" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('rechercher') }}" method="GET">
                                        <input type="text" name="recherche" placeholder="Rechercher un produit">
                                        <button type="submit" class="btn btn-outline-light" style="margin-right: 10px;">Rechercher</button>
                                    </form>
                                </li>
                            </ul> 
                            @guest
                            <ul class="navbar-nav ml-auto"> <!-- Aligner à droite lorsque l'utilisateur n'est pas connecté -->
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" style="margin-right: 10px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" style="margin-right: 10px;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                            </ul>
                            @else
                            <!-- Afficher ces éléments lorsque l'utilisateur est connecté -->
                            <ul class="navbar-nav ml-auto"> <!-- Aligner à droite lorsque l'utilisateur est connecté -->
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="{{ url('/#') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" style="margin-right: 10px;"  href="{{ route('produits.index') }}">Mes produits</a>
                                </li>
                                <li>
                                <div class="rounded-circle" style="width: 50px; height: 50px; overflow: hidden;" style="margin-right: 10px;">
                                        @auth
                                            <!-- Afficher la photo en fonction du profil conecter-->
                                            <a href="{{ route('profils.index') }}">
                                                <img src="{{ asset('storage/' . auth()->user()->profil->photo) }}" alt="Photo du profil" width="50" height="50" style="object-fit: cover;">
                                            </a>
                                        @endauth
                                    </div>
                                    <li class="nav-item">
                                        {{-- <a class="btn btn-outline-light" href="{{ route('categories.client') }}">Mes produits</a> --}}
                                    </li>
        
                            </li>
                            </ul>
                            @endguest
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-succes">
                        {{session('succes')}}
                    </div>
                        
                    @endif
                </nav>
            </div>
        </nav>
    </div><br><br><br><br><br>

    <div class="card-group">
        @if(isset($produits))
            @foreach ($produits as $produit)
            <div class="col mx-3 shadow"> 
                <div class="card">
                    <div class="image-container">
                        <a href="#" onclick="toggleImages{{ $produit->id }}()">
                            <img class="card" src="{{ asset('storage/' . $produit->photo) }}" alt="Photo du produit">
                        </a>
                        <div id="image-container{{ $produit->id }}" class="hidden-images">
                            <img class="card" src="{{asset('storage/' .$produit->image) }}" alt="Photo du profil">
                            <img class="card" src="{{asset('storage/' .$produit->imagephoto) }}" alt="Photo du profil">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Produit : {{ $produit->nom }}</h5>
                        <p class="card-text">Prix: {{ $produit->prix }}</p>
                        <p class="card-text">Taille: {{ $produit->taille }}</p>
                        <p class="card-text">Etat: {{ $produit->etats }}</p>
                        @if(auth()->user())
                            <p class="card-text">Nom du Propriétaire: {{ $produit->users->name }}</p>
                        @endif
                        <form action="{{ route('panier') }}" method="post">
                            @csrf 
                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                        
                            <button type="submit" class="btn btn-infos float-right" style="background-color: brown;" style="margin-right: 10px;">Ajouter Au Panier</button> 
                            <a href="{{ route('chatify') }}" class="btn btn-succes float-right" style="background-color: rgb(42, 155, 165);">Marchander</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    
    <style>
    /* Cacher les images supplémentaires par défaut */
    .hidden-images {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
    }
    
    .image-container {
        position: relative;
        cursor: pointer;
    }
    
    </style>
    
    <script>
    function toggleImages{{ $produit->id }}() {
        var container = document.getElementById('image-container{{ $produit->id }}');
    
        if (container.style.display === 'none') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    }
    </script>
            <div class="card-group">
        @if(isset($categories))
            @foreach ($categories as $categorie)
            <div class="col mx-3 shadow"> 
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">Libellé : {{ $categorie->libelle }}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
            
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    