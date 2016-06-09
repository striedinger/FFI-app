@extends('layouts.app')

@section('content')
@if(Auth::user()->isAdmin())
<div class="form-group">
	<a href="{{ url('consultations/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Agendar Sesion Nueva</a>
</div>
@endif
<div class="breadcrumb">
	@foreach($states as $state)
	<li><a href="{{ url('consultations/state') . '/' . $state->id }}">{{ $state->name }} </a></li>
	@endforeach
	@if(Auth::user()->isAdmin())
	<li><a href="{{ url('consultations/me') }}">Mis Sesiones</a></li>
	@endif
</div>
@if(count($consultations)==0)
<div class="text-center">
	<p>No hay sesiones de citas activas en este momento, intenta en otra ocasion.</p>
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
				<p><strong>Asesor: </strong>{{$consultation->user->name}}</p>
				<p><strong>Duracion de sesion: </strong>{{ $consultation->duration }} minutos</p>
				<p><strong>Lugar: </strong>{{ $consultation->location }}</p>
				<a href="{{ url('consultations/view') . '/' . $consultation->id }}">Ver Más</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection