@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form class="d-flex w-75">
                    <input class="form-control me-2" type="search" placeholder="Recherchez votre livre" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
    
</div>

 
  


@endsection