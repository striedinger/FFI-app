@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Usuarios
    </div>
    <div class="panel-body">
        @if (count($users) > 0)
        {!! Form::open(['action' => array('UserController@search'), 'method' => 'get']) !!}
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar..." name="q">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        {!! Form::close() !!}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Ciudad</th>
                    <th>Departamento</th>
                    <th>Rol</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="{{ $user->active ? 'success' : 'danger' }}">
                        <td class="table-text"><a href="{{ url('users/view') . '/' . $user->id }}">{{ $user->name }}</a></td>
                        <td class="table-text">{{ $user->email }}</td>
                        <td class="table-text">{{$user->phone}}</td>
                        <td class="table-text">{{ $user->city }}</td>
                        <td class="table-text">{{ $user->state->name }}</td>
                        <td class="table-text">{{ $user->role->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div align="center">
            {{ $users->render() }}
        </div>
        @endif
    </div>
</div>
@endsection