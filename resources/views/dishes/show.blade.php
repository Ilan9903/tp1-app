@extends('layouts.main')

@section('title', 'View Dish: ' . $dish->titre)

@section('content')

    <h1 class="mb-4">Détails du Plat</h1>
    <div class="card mb-3">
        <img src="{{ $dish->image_url }}" class="card-img-top" alt="{{ $dish->titre }}">
        <div class="card-body">
            <h5 class="card-title">{{ $dish->titre }}</h5>
            <p class="card-text"><strong>Créateur:</strong> {{ $dish->user->name }}</p>
            <p class="card-text"><strong>Likes:</strong> {{ $dish->likes->count() }}</p>
            <p class="card-text"><strong>Recette:</strong> {{ $dish->recette }}</p>
        </div>
    </div>

    @if(Auth::user()->can('edit dishes') || Auth::id() === $dish->user_id)
        <a href="{{ route('dishes.edit', $dish) }}" class="btn btn-warning">EDITER</a>
    @endif
    <a href="{{ route('dishes.index') }}" class="btn btn-secondary">Retour aux recettes</a>
@endsection
