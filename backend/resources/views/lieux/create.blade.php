@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un lieu de collecte</h2>
        <form action="{{ route('lieux.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="horaires_collecte">Horaires de collecte :</label>
                <input type="text" name="horaires_collecte" class="form-control" required>
            </div>
            <!-- <div class="form-group">
                <label for="trashTypes">Types de déchets acceptés :</label>
                <select name="trashTypes[]" id="trashTypes" class="form-control" multiple>
                    @foreach($trashTypes as $trashType)
                        <option value="{{ $trashType->id }}">{{ $trashType->name }}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="form-group">
                <label>Types de déchets acceptés :</label>
                @foreach ($trashTypes as $trashType)
                    <div class="form-check">
                        <input type="checkbox" name="trash_types[]" value="{{ $trashType->id }}" class="form-check-input">
                        <label class="form-check-label">{{ $trashType->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le lieu</button>
        </form>
    </div>
@endsection
