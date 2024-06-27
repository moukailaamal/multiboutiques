@extends('layouts.app')

@section('title', 'Modifier le compte ')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le compte</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                    
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->adresse }}">
                        </div>
                        <div class="mb-3">
                            <label>Genre</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="genre_femme" name="genre" value="femme" {{ $user->genre == 'femme' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genre_femme">Femme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="genre_homme" name="genre" value="homme" {{ $user->genre == 'homme' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genre_homme">Homme</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
