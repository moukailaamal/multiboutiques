@extends('layouts.app')

@section('title', 'Connexion Vendeur')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4>Connectez-vous cher vendeur(é)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendeurs.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('vendeurs.registerForm') }}" class="text-success">S'inscrire</a> |
                    <a href="" class="text-success">Mot de passe oublié</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
