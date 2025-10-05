@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <h1 class="mb-4">Home - Recettes</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        @can('create dishes')
            <a href="{{ route('dishes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> CRÉER
            </a>
        @endcan
        <div></div>
    </div>

    <table class="table table-striped table-dish">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Titre</th>
            <th scope="col">Créateur</th>
            <th scope="col">Likes</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dishes as $dish)
            <tr>
                <td><img src="{{ $dish->image_url }}" alt="{{ $dish->titre }}" class="rounded-circle"></td>
                <td>{{ $dish->titre }}</td>
                <td>{{ $dish->user->name }}</td>
                <td>{{ $dish->likes->count() }}</td>
                <td>
                    <a href="{{ route('dishes.show', $dish) }}" class="btn btn-sm btn-info text-white">Voir</a>
                    @if(Auth::user()->can('edit dishes') || Auth::id() === $dish->user_id)
                        <a href="{{ route('dishes.edit', $dish) }}" class="btn btn-sm btn-warning">Éditer</a>
                    @endif
                    @can('delete dishes')
                        <form action="{{ route('dishes.destroy', $dish) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plat ?')">Supprimer</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $dishes->links('pagination::bootstrap-5') }}
    </div>

@endsection
