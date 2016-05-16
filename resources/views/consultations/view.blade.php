@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		Sesión de Citas
	</div>
	<div class="panel-body">
		<p><strong>Departamento: </strong>{{ $consultation->state->name }}</p>
		<p><strong>Fecha: </strong>{{ date_format(date_create($consultation->start_date), "h:i A d/m/y") }} - {{ date_format(date_create($consultation->end_date), "h:i A d/m/y") }}</p>
		<p><strong>Lugar: </strong>{{ $consultation->location }}</p>
		<p><strong>Asesor: </strong><a href="{{ url('users/view') . '/' . $consultation->user->id }}">{{$consultation->user->name}}</a></p>
		<p><strong>Duracion de sesion: </strong>{{ $consultation->duration }} minutos</p>
		<p><strong>Descripcion: </strong>{{ $consultation->description }}</p>
		<p><strong>Horas disponibles:</strong></p>
		@if(count($consultation->availableTimes)==0)
		<p>No hay citas disponibles para esta sesion</p>
		@endif
		@if(count($consultation->availableTimes)>0)
		<form>
			@foreach($consultation->availableTimes as $time)
			<div class="radio">
				<label><input type="radio" name="time" value="{{ $time->id }}">{{ date_format(date_create($time->time), "h:i A d/m/y") }}</label>
			</div>
			@endforeach
			<button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Agendar</button>
		</form>
		@endif
	</div>
</div>
@endsection