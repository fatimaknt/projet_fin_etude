
<h2>Catégorie associée :</h2>
<hr>
<div class="col mx-3 shadow"> 
    <div class="card">
    <img src="{{asset('storage/' .$categorie->photo) }}" alt="Photo du profil">
    <hr>
    <div class="card-body">
    <h5 class="card-title">Libelle: {{ $categorie->libelle }} </h5>
    <h5 class="card-title">Description: {{ $categorie->description }}</h5>
    <button class="btn-btn-succes">
    <a href="{{ route('produits.index') }}">Retour à la liste des produits</a>
</button>
</div>
</div>