@extends('layouts.app')

@section('title', 'Créer une nouvelle catégorie')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label" style="color: #555;">Nom de la catégorie</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de la catégorie">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
