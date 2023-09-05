@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un nouveau type de dechet</h2>
            </div>
            <div class="pull-right mt-3">
                <a class="btn btn-primary" href="{{ route('trashType.index') }}"> Retour</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('trashType.store') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <strong>Type:</strong>
            <select name="name" class="form-control" id="trashTypeSelect">
                <option value="">Selectioner un type...</option>
                <option value="Plastique">Plastique</option>
                <option value="Verre">Verre</option>
                <option value="Metaux">Metaux</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group" id="otherTrashType" style="display: none;">
            <strong>Entrer un autre type:</strong>
            <input type="text" name="other_name" class="form-control">
        </div>

        <!-- Ajoutez une marge en bas au bouton "Submit" -->
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-success">Ajouter</button>
        </div>
        
    </form>
    <script>
        // Afficher ou masquer le champ "other_name" en fonction de la sélection du sélecteur
        document.getElementById('trashTypeSelect').addEventListener('change', function() {
            const otherNameDiv = document.getElementById('otherTrashType');
            otherNameDiv.style.display = this.value === 'Other' ? 'block' : 'none';
        });
    </script>
@endsection