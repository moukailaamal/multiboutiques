@extends('layouts.app')

@section('title', 'Créer un nouveau produit')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 border p-4 rounded">
            <h4 class="text-center mb-4" style="color: #007bff;">Ajouter un Produit</h4>
            <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #555;">Nom</label>
                    <input type="text" name="nom" id="name" class="form-control" placeholder="Nom du produit" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" style="color: #555;">Description</label>
                    <textarea id="description" name="description" class="form-control" maxlength="255" placeholder="Décrire" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label" style="color: #555;">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label" style="color: #555;">Prix</label>
                    <input type="number" name="prix" id="prix" class="form-control" placeholder="Prix du produit" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label" style="color: #555;">Choisir une image pour le produit</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>
                <div class="mb-3">
                    <label for="categorie_id" class="form-label" style="color: #555;">Sélectionnez la catégorie</label>
                    <select name="categorie_id" id="categorie_id" class="form-select" required>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">AJOUTER</button>
            </form>
        </div>
    </div>
</div>
@endsection