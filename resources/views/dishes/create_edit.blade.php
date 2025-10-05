@extends('layouts.main')

@section('title', isset($dish) ? 'Éditer un plat' : 'Créer un plat')

@section('content')
    <h1 class="mb-4">Create/Edit dish</h1>

    <form method="POST"
          action="{{ isset($dish) ? route('dishes.update', $dish) : route('dishes.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if(isset($dish))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre"
                   value="{{ old('titre', $dish->titre ?? '') }}" required>
            @error('titre')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="recette" class="form-label">Recette</label>
            <textarea class="form-control" id="recette" name="recette" rows="5" required maxlength="2048">{{ old('recette', $dish->recette ?? '') }}</textarea>
            @error('recette')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (Actuelle: <a href="{{ $dish->image_url ?? '#' }}" target="_blank">Voir l'image</a>)</label>
            <input type="file" class="form-control" id="image" name="image"
                {{ isset($dish) && $dish->image_url ? '' : 'required' }}>
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">SAUVEGARDER</button>
        <a href="{{ route('dishes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
