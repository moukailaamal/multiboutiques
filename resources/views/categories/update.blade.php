@extends('layouts.app')

@section('title', 'modifier une categorie')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 border p-4 rounded">
            <h4 class="text-center mb-4" style="color: #007bff;">Modifier votre catégorie</h4>
            <form action="{{ route('categories.update', $categorie->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label" style="color: #555;">Nom de la catégorie</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $categorie->nom }}">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Modifier</button>
            </form>
        </div>
    </div>
</div>

@endsection