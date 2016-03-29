@extends('layouts.app')

@section('content')
<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Proyecto
			@can('update', $project)
			<a href=" {{ url('/projects/update') . '/' . $project->id }}" class="pull-right">Editar</a>
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
				<label>Monto Solicitado</label>
				<p>{{$project->amount}}</p>
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
</div>
@endsection