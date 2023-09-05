@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier un lieu de collecte</h2>
        <form action="{{ route('lieux.custom-update', ['lieu' => $lieu->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" class="form-control" value="{{ $lieu->adresse }}" required>
            </div>
            <div class="form-group">
                <label for="horaires_collecte">Horaires de collecte :</label>
                <input type="text" name="horaires_collecte" class="form-control" value="{{ $lieu->horaires_collecte }}" required>
            </div>
            <div class="form-group">
                <label>Types de déchets acceptés :</label>
                @foreach ($trashTypes as $trashType)
                    <div class="form-check">
                        <input type="checkbox" name="trash_types[]" value="{{ $trashType->id }}" class="form-check-input" 
                            @if($lieu->trashTypes->contains($trashType->id)) checked @endif>
                        <label class="form-check-label">{{ $trashType->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Modifier le lieu</button>
        </form>
    </div>
@endsection
