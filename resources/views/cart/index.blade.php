@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Votre Panier</h1>
    @if (count($contenuPanier) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contenuPanier as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }} $</td>
                        <td>
                            <input type="number" value="{{ $item->qty }}" class="update-quantity" data-rowid="{{ $item->rowId }}">
                        </td>
                        <td>{{ $item->subtotal() }} $</td>
                        <td>
                            <a href="{{ route('supprimerDuPanier', ['rowId' => $item->rowId]) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <p>Total: {{ $total }} $</p>
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
