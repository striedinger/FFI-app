@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/consultations') }}">Sesiones de Citas</a></li>
    <li><a href="{{ url('/consultations') . '/view/' . $consultation->id }}">Sesion de Citas</a></li>
    <li class="active">Editar Sesion de Citas</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Actualizar Sesion de Citas
	</div>
	<div class="panel-body">
		<form method="post">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label>Encargado</label>
				{{ Form::select('user_id', $assistants, $consultation->user_id, ['class' => 'form-control']) }}
				@if ($errors->has('user_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('user_id') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Duracion</label>
				<p>{{ $consultation->duration }} minutos</p>
			</div>
			<div class="form-group">
				<label>Departamento</label>
				{{ Form::select('state_id', $states, $consultation->state_id, ['class' => 'form-control']) }}
				@if ($errors->has('state_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('state_id') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Lugar</label>
				<input type="text" name="location" class="form-control" value="{{ $consultation->location }}" required>
				@if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea name="description" class="form-control">{{ $consultation->description }}</textarea>
				@if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 form-group">
					<label>Fecha de Inicio</label>
					<p>{{ date_format(date_create($consultation->start_date), "h:i A d/m/y")  }}</p>
				</div>
				<div class="col-xs-12 col-md-6 form-group">
					<label>Fecha de Fin</label>
					<p>{{ date_format(date_create($consultation->end_date), "h:i A d/m/y")  }}</p>
				</div>
			</div>
			@if(!$consultation->active)
			<div class="form-group">
				<label>Activa</label>
				<select class="form-control" name="active">
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>
				<span class="help-block">
					<strong>Importante: </strong>Una vez activada no podra volver a ser desactivada
				</span>
			</div>
			@endif
			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Actualizar</button>
			</div>
		</form>
	</div>
</div>
@endsection