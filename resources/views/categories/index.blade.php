@extends('layouts.app')

@section('title', 'liste des categories')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;" href="{{ route('categories.create') }}">Creer un novelle categorie</a>
    </div>
    <div class="row">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{ $categorie->nom }}</td>
            <td>
                <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Modifier</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
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