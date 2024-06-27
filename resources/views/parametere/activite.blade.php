@extends('layouts.app')

@section('title', 'Activité de l\'Utilisateur')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Activité de l'Utilisateur</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           <a href=""><span><i class="bi bi-book"></i> Livres Ajoutés</span></a></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          </a>  <a href=""><span><i class="bi bi-bookmark"></i> Livres Empruntés</span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href=""><span><i class="bi bi-heart"></i> Livres Favoris</span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href=""><span><i class="bi bi-chat"></i> Commentaires</span></a>
                            <span class="badge bg-warning rounded-pill">15</span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href=""><span><i class="bi bi-star"></i> Évaluations</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
