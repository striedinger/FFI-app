@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		Cita de <a href="{{ url('users/view') . '/' . $appointment->user->id }}">{{ $appointment->user->name }}</a>
		@can('update', $appointment)
		<a href="{{ url('appointments/update') . '/' . $appointment->id }}" class="pull-right">Editar</a>
		@endcan
	</div>
	<div class="panel-body">
		<p><strong>Empresa: </strong><a href="{{ url('companies/view') . '/' . $appointment->company->id }}">{{ $appointment->company->name }}</a></p>
		<p><strong>Fecha: </strong>{{ date_format(date_create($appointment->date), "h:i A d/m/y") }}</p>
		<p><strong>Asesor: </strong>{{ $appointment->assistant->name }}</p>
		<p><strong>Estado: </strong>{{ $appointment->status }}</p>
		@if($appointment->hasConsultation())
			<p><strong><u>Información Adicional</strong></u></p>
			<p><strong>Lugar: </strong>{{ $appointment->consultationTime->consultation->location }}</p>
			<p><strong>Duracion: </strong>{{ $appointment->consultationTime->consultation->duration }} minutos</p>
			@if($appointment->consultationTime->consultation->duration)
			<p><strong>Descripcion: </strong>{{ $appointment->consultationTime->consultation->description }}</p>
			@endif
		@endif
		@if($appointment->assistant_comment)
		<p><strong>Comentario:</strong> {{ $appointment->assistant_comment }}</p>
		@endif
	</div>
</div>
@endsection