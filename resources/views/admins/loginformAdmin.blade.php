@extends('layouts.app')

@section('title', 'Connectee')

@section('content')
<form action="{{ route('admins.login') }}" method="POST" class="w-50 mx-auto mt-5">
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
      <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: hsl(134, 61%, 41%);" >
        Se connecter</button>
    </div>
  </form>
  
@endsection