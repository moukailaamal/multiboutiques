@extends('layouts.app')

@section('title', 'Mettre à jour le produit')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 border p-4 rounded">
            <h4 class="text-center mb-4" style="color: #007bff;">Mettre à jour le Produit</h4>
            <form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #555;">Name</label>
                    <input type="text" name="nom" id="name" class="form-control" placeholder="Nom du produit"
                     value="{{ $produit->nom }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" style="color: #555;">Description</label>
                    <textarea id="description" name="description" class="form-control" maxlength="255" placeholder="Décrire" required>{{ $produit->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label" style="color: #555;">Stock</label>
                    <input type="text" id="stock" name="stock" class="form-control" value="{{ $produit->stock }}" required>
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label" style="color: #555;">Prix</label>
                    <input type="text" name="prix" id="prix" class="form-control" placeholder="Prix du produit" value="{{ $produit->prix }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label" style="color: #555;">Choisir une nouvelle image pour le produit (optionnel)</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="categorie_id" class="form-label" style="color: #555;">Sélectionnez la catégorie</label>
                    <select name="categorie_id" id="categorie_id" class="form-select" required>
                        @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">METTRE À JOUR</button>
            </form>
        </div>
    </div>
</div>
@endsection
