@extends('layouts.app')

@section('title', 'Information Utulisateur')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Informations Personnelles</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nom :</strong></p>
                    <p><strong>Genre :</strong></p>
                    <p><strong>Adresse :</strong></p>
                    <p><strong>Email :</strong> </p>
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action">
                            <h2 class="h5 mb-0">Modifier les informations</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection