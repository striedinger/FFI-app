@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/consultations') }}">Sesiones de Citas</a></li>
    <li class="active">Ver Sesion de Citas</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Sesión de Citas
		@can('update', $consultation)
		<a href=" {{ url('/consultations/update') . '/' . $consultation->id }}" class="pull-right">Editar</a>
		@endcan
	</div>
	<div class="panel-body">
		@if(Auth::user()->hasAppointmentInConsultation($consultation))
		<div class="alert alert-warning text-center">
			<p>Usted ya cuenta con una cita para esta sesión</p>
		</div>
		@endif
		<p><strong>Departamento: </strong>{{ $consultation->state->name }}</p>
		<p><strong>Fecha: </strong>{{ date_format(date_create($consultation->start_date), "h:i A d/m/y") }} - {{ date_format(date_create($consultation->end_date), "h:i A d/m/y") }}</p>
		<p><strong>Lugar: </strong>{{ $consultation->location }}</p>
		<p><strong>Asesor: </strong><a href="{{ url('users/view') . '/' . $consultation->user->id }}">{{$consultation->user->name}}</a></p>
		<p><strong>Duracion de sesion: </strong>{{ $consultation->duration }} minutos</p>
		<p><strong>Descripcion: </strong>{{ $consultation->description }}</p>
		@if(count($consultation->availableTimes)==0)
		<p>No hay citas disponibles para esta sesion</p>
		@endif
		@if(count($consultation->availableTimes)>0)
		{!! Form::open(['action' => 'ConsultationController@appointment', 'method' => 'post']) !!}
		<div class="form-group">
			<label>Empresa</label>
			{{ Form::select('company', $companies, null, ['class' => 'form-control']) }}
			<small>Nota: Actualmente solo se aceptan citas de empresas priorizadas.</small>
			@if ($errors->has('company'))
			<span class="help-block">
                <strong>{{ $errors->first('company') }}</strong>
            </span>
            @endif
		</div>
		<p><strong>Horas disponibles:</strong></p>
			<small>Seleccione la hora que más le convenga</small>
			@foreach($consultation->availableTimes as $time)
			<div class="radio">
				<label><input type="radio" name="time" value="{{ $time->id }}" checked>{{ date_format(date_create($time->time), "h:i A d/m/y") }}</label>
			</div>
			@endforeach
			@if(!Auth::user()->isAdmin() && !Auth::user()->hasAppointmentInConsultation($consultation) && count($companies)>0 && $consultation->active)
			<button type="submit" class="btn btn-primary" onclick="return confirm('¿Deseas agendar tu cita para sesion en la hora seleccionada?')"><i class="fa fa-book"></i> Agendar</button>
			@endif
		{!! Form::close() !!}
		@endif
	</div>
</div>
@if(count($appointments)>0 && Auth::user()->isAdmin())
<div class="panel panel-default">
	<div class="panel-heading">
		Citas
	</div>
	<div class="panel-body">
		<div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Empresa</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr class="{{ $appointment->active ? 'success' : 'danger' }}">
                            <td class="table-text">{{ $appointment->id }}</td>
                            <td class="table-text">{{ date_format(date_create($appointment->date), "h:i A d/m/y") }}</td>
                            <td class="table-text"><a href="{{ url('users/view') . '/' . $appointment->user->id }}">{{$appointment->user->name}}</a></td>
                            <td class="table-text"><a href="{{ url('companies/view') . '/' . $appointment->company->id }}">{{$appointment->company->name}}</a></td>
                            <td class="table-text">{{$appointment->status}}</td>
                            <td class="table-text"><a href="{{ url('appointments/view') . '/' . $appointment->id }}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
	</div>
</div>
@endif
@endsection