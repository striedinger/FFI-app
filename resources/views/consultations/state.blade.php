@extends('layouts.app')

@section('content')
@if(Auth::user()->isAdmin())
<div class="form-group">
	<a href="{{ url('consultations/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Agendar Sesion Nueva</a>
</div>
<div class="breadcrumb">
	<li><a href="{{ url('consultations/') }}">Ver Todos </a></li>
	<li>{{ $state->name }}</li>
</div>
@endif
@if(count($consultations)==0)
<div class="text-center">
	<p>No hay sesiones de citas en este departamento, intenta en otra ocasion.</p>
</div>
@endif
<div class="row">
	@foreach($consultations as $consultation)
	<div class="col-xs-12">
		<div class="panel {{ $consultation->active ? 'panel-success' : 'panel-danger' }}">
			<div class="panel-heading">
				{{ $consultation->state->name }}: {{ date_format(date_create($consultation->start_date), "h:i A d/m/y") }} - {{ date_format(date_create($consultation->end_date), "h:i A d/m/y") }}
				@can('update', $consultation)
				<a href=" {{ url('/consultations/update') . '/' . $consultation->id }}" class="pull-right">Editar</a>
				@endcan
			</div>
			<div class="panel-body">
				<p><strong>Asesor: </strong><a href="{{ url('users/view') . '/' . $consultation->user->id }}">{{$consultation->user->name}}</a></p>
				<p><strong>Duracion de sesion: </strong>{{ $consultation->duration }} minutos</p>
				<p><strong>Lugar: </strong>{{ $consultation->location }}</p>
				<a href="{{ url('consultations/view') . '/' . $consultation->id }}">Ver Más</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection