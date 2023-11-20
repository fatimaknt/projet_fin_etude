@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Liste des Utilisateurs
                </div>
                <form action="{{ route('rechercherUser') }}" method="GET">
                    <input type="text" name="recherche" placeholder="Rechercher un produit">
                    <button type="submit" class="btn btn-outline-dark" style="margin-right: 10px;">Rechercher</button>
                </form>
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if ($user->role == "client")
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ?')">Supprimer</button>
                                    </form>
                                </td>
                                <td>
                                    @if ($user->is_blocked ==1)
                                    <a href="{{route('bloquer', $user)}}" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment bloquer ?')">Bloquer</a>
                                     @else
                                     <a href="{{route('debloquer',$user)}}" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment debloquer ?')">Debloquer</a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('home') }}" class="btn btn-primary mt-3">Retour à la page d'accueil</a>
</div>
@endsection
