@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-offset-2 col-sm-8">
		@if(Session::has('status'))
            <div class="alert alert-success" align="center">
                <h2>{{ Session::get('status') }}</h2>
            </div>
        @endif
		<div class="panel panel-default">
			<div class="panel-heading">
				Proyecto
				@can('update', $project)
				<a href=" {{ url('/project/update') . '/' . $project->id }}" class="pull-right">Editar</a>
				@endcan
			</div>
			<div class="panel-body">
					<div class="form-group">
						<label>Nombre</label>
						<p>{{$project->name}}</p>
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<p>{{$project->description}}</p>
					</div>
					<div class="form-group">
						<label>Empresa</label>
						<p><a href="{{ url('companies/view') . '/' . $project->company->id }}">{{$project->company->name}}</a></p>
					</div>
					<div class="form-group">
						<label>Convocatoria</label>
						<p>{{$project->term->name}}</p>
					</div>
					<div class="form-group">
						<label>Administrador</label>
						<p><a href="{{ url('users/view') . '/' . $project->user->id }}">{{$project->user->name}}</a></p>
					</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Modelo Canvas de Negocio <a href="{{ url('canvas/create') . '/' . $project->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($project->canvas)>0)
					<table class="table table-striped project-table">
						<thead>
							<th>ID</th>
							<th>Fecha de Modificacion</th>
						</thead>
						<tbody>
							@foreach ($project->canvas as $canvas)
							<tr>
								<td class="table-text"><a href="{{ url('canvas/view') . '/' . $canvas->id }}">{{ $canvas->id }}</a></td>
								<td class="table-text">{{ $canvas->updated_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
			</div>
		</div>
	</div>
</div>
@endsection