@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier type de dechet</h2>
            </div>
            <div class="pull-right">
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
    <form action="{{ route('trashType.update',$trashType->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row mt-3">
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $trashType->name }}" class="form-control" placeholder="Name">
                </div>
            </div> -->
            <div class="form-group">
                <strong>Types:</strong>
                <select name="name" class="form-control" id="trashTypeSelect">
                    <option value="">Choisir un type...</option>
                    <option value="Plastique" {{ $trashType->name === 'Plastique' ? 'selected' : '' }}>Plastique</option>
                    <option value="Verre" {{ $trashType->name === 'Verre' ? 'selected' : '' }}>Verre</option>
                    <option value="Metaux" {{ $trashType->name === 'Metaux' ? 'selected' : '' }}>Metaux</option>
                    <option value="Other" {{ $trashType->name !== 'Plastique' && $trashType->name !== 'Verre' && $trashType->name !== 'Metaux' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group" id="otherTrashType" style="display: none;">
                <strong>Autre types:</strong>
                <input type="text" name="other_name" class="form-control" value="{{ $trashType->name !== 'Plastique' && $trashType->name !== 'Verre' && $trashType->name !== 'Metaux' ? $trashType->name : '' }}">
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
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