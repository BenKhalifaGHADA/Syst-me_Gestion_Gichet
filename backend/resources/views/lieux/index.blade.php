@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des lieux de collecte</h2>
        <a href="{{ route('lieux.create') }}" class="btn btn-success">Ajouter un lieu</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Adresse</th>
                    <th>Horaires de collecte</th>
                    <th>Types de déchets acceptés</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lieux as $lieu)
                    <tr>
                        <td>{{ $lieu->id }}</td>
                        <td>{{ $lieu->adresse }}</td>
                        <td>{{ $lieu->horaires_collecte }}</td>
                        <td>
                        @foreach ($lieu->trashTypes as $trashType)
                            <span class="badge rounded-pill bg-dark">{{ $trashType->name }}</span>
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ route('lieux.edit', $lieu->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('lieux.destroy', ['lieux' => $lieu->id]) }}" method="POST"style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
