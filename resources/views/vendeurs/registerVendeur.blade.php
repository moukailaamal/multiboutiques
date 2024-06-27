@extends('layouts.app')

@section('title', 'Inscription Vendeur')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4>Inscription Vendeur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendeurs.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse :</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_boutique" class="form-label">Nom de la boutique :</label>
                            <input type="text" class="form-control" id="nom_boutique" name="nom_boutique" required>
                        </div>
                        <div class="mb-3">
                            <label for="ouverture" class="form-label">Heure d'ouverture :</label>
                            <input type="time" class="form-control" id="ouverture" name="ouverture" required>
                        </div>
                        <div class="mb-3">
                            <label for="fermeture" class="form-label">Heure de fermeture :</label>
                            <input type="time" class="form-control" id="fermeture" name="fermeture" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
