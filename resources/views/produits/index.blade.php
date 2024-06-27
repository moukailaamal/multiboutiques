@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col"><a class="btn btn-primary" 
            style="background-color: #28a745; border-color: hsl(134, 61%, 41%);" 
            href="{{ route('produits.create') }}">Créer un nouveau produit</a></div>
        
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">le produit</th>
                    <th scope="col">name</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                <tr>
                    <td><img src="{{ asset($produit->image_path) }}" alt="Image du produit" width="100"></td>
                    <td>{{ $produit->nom }}</td>
                    <td>
                        <a href="{{ route('produits.edit', $produit->id) }}" 
                           class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
