@extends('layouts.app')

@section('title', 'Inscrire ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('admins.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom"required>
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Numero</label>
                    <input type="number" pattern="\d{8}" maxlength="8" class="form-control" id="numero" name="numero" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password"required>
                </div>
                <button type="submit"  style="background-color: #28a745; border-color: hsl(134, 61%, 41%);" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

@endsection