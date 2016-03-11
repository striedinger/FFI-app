@extends('layouts.app')

@section('content')
<div>
    @if(Session::has('status'))
    <div class="alert alert-success" align="center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ Session::get('status') }}</p>
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Proyectos <a href="{{ url('projects/create') }}" class="pull-right"><i class="fa fa-plus"></i></a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Nombre</th>
                        <th>Administrador</th>
                        <th>Empresa</th>
                        <th>Convocatoria</th>
                    </thead>
                    @if (count($projects) > 0)
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
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div align="center">
        {{ $projects->render() }}
    </div>
</div>
@endsection