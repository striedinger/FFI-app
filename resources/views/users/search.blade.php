@extends('layouts.app')

@section('title')
    Buscar Usuario
@endsection

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/users') }}">Usuarios</a></li>
    <li class="active">Buscar Usuario</li>
</ol>
<div class="panel panel-default">
    <div class="panel-heading">
        Buscar Usuarios
    </div>
    <div class="panel-body">
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
        @if (count($users) == 0)
        <p class="text-center">No se encontraron resultados para su busqueda de '{{ $query }}'</p>
        @endif
        @if (count($users) > 0)
        <p class="text-center">Su busqueda de '{{ $query }}' ha producido {{ count($users) }} resultado(s)</p>
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
        @endif
    </div>
</div>
@endsection