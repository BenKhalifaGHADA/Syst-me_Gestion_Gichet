@extends('layouts.app')
@section('styles')
    <style>
        /* Ajoutez le style pour l'arrière-plan */
        
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Liste d'utilisateurs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Creer un nouveau utilisateur</a>
        </div>
        <a href="{{ route('generate.pdf') }}" class="btn btn-primary">Télécharger le PDF</a>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Role</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Voir</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editer</a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</table>
{!! $data->render() !!}
@endsection
