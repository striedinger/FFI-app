@extends('layouts.app')

@section('title')
    Empresas
@endsection

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Empresas <a href="{{ url('companies/create') }}" class="pull-right"><i class="fa fa-plus"></i></a>
        </div>
        <div class="panel-body">
            @if (count($companies)==0)
            <p class="text-center">No hay empresas registradas.</p>
            @endif
            @if (count($companies) > 0)
            @if(Auth::user()->isAdmin())
            {!! Form::open(['action' => array('CompanyController@search'), 'method' => 'get']) !!}
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="q">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            {!! Form::close() !!}
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Empresa</th>
                        <th>Ciudad</th>
                        <th>Departamento</th>
                        <th>Administrador</th>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                        <tr class="{{ $company->active ? 'success' : 'danger' }}">
                            <td class="table-text"><a href="{{ url('companies/view') . '/' . $company->id }}">{{ $company->name }}</a></td>
                            <td class="table-text">{{$company->city}}</td>
                            <td class="table-text">{{$company->state->name}}</td>
                            <td class="table-text"><a href="{{ url('users/view') . '/' . $company->user->id }}">{{$company->user->name}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
    <div align="center">
        {{ $companies->render() }}
    </div>
</div>
@endsection