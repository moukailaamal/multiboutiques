@extends('layouts.app')

@section('title', 'Connexion client')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4>Connectez-vous cher client(é)</h4>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('clients.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email"name="email" id="email" class="form-control" placeholder=" Votre email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password"name="password" id="password" class="form-control" placeholder=" Votre password">
                        </div>
    
                        <button type="submit" class="btn btn-success">login</button>
                    </form>
                    
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('clients.registerForm') }}" class="text-success">S'inscrire</a> |
                    <a href="" class="text-success">Mot de passe oublié</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection