@extends('layouts.app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Proyectos <a href="{{ url('projects/create') }}" class="pull-right"><i class="fa fa-plus"></i></a>
        </div>
        <div class="panel-body">
            @if (count($projects)==0)
            <p>No hay proyectos registrados.</p>
            @endif
            @if (count($projects) > 0)
            {!! Form::open(['action' => array('ProjectController@search'), 'method' => 'get']) !!}
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
                        <th>Administrador</th>
                        <th>Empresa</th>
                        <th>Convocatoria</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr class="{{ $project->active ? 'success' : 'danger' }}">
                            <td class="table-text"><a href="{{ url('/projects/view') . '/' . $project->id }}">{{ $project->name}}</a></td>
                            <td class="table-text"><a href="{{ url('/users/view') . '/' . $project->user_id }}">{{ $project->user->name}}</a></td>
                            <td class="table-text"><a href="{{ url('/companies/view') . '/' . $project->company_id }}">{{ $project->company->name}}</a></td>
                            <td class="table-text">{{ $project->term->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
    <div align="center">
        {{ $projects->render() }}
    </div>
</div>
@endsection