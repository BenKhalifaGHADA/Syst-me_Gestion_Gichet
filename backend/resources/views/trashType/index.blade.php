@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Type de dechets</h2>
            </div>
            <div class="pull-right">
                @can('trashType-create')
                <a class="btn btn-success" href="{{ route('trashType.create') }}"> Creer un nouveau type de dechet</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        <script>
            setTimeout(function() {
                var successAlert = document.getElementById('alert-success');
                if (successAlert) {
                    successAlert.remove();
                }
            }, 3000);
        </script>
    @endif
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($trashTypes as $trashType)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $trashType->name }}</td>
            <td>
                <form action="{{ route('trashType.destroy',$trashType->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('trashType.show',$trashType->id) }}">Voir</a>
                    @can('trashType-edit')
                    <a class="btn btn-primary" href="{{ route('trashType.edit',$trashType->id) }}">Editer</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('trashType-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $trashTypes->links() !!}
@endsection

