@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h2>Ajouter un lieu de collecte</h2>
    <form action="{{ route('lieux.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="horaires">Horaires de collecte :</label>
            <input type="text" name="horaires" id="horaires" class="form-control" required>
        </div>
        <!-- Ajoutez des champs pour les types de déchets acceptés -->
        <!-- <div class="form-group">
            <label for="trash_types">Types de déchets acceptés :</label>
            <select name="trash_types[]" class="form-control" multiple required>
                @foreach ($trashTypes as $trashType)
                    <option value="{{ $trashType->id }}">{{ $trashType->nom }}</option>
                @endforeach
            </select>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="trash_types">Types de déchets acceptés :</label>
            <br/>
            @foreach($trashTypes as $trashType)
                <label>{{ Form::checkbox('permission[]', $trashType->id, false, array('class' => 'name')) }}
                {{ $trashType->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
