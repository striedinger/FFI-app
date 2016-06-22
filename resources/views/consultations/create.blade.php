@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/consultations') }}">Sesiones de Citas</a></li>
    <li class="active">Crear Sesion de Citas</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Crear Sesion de Citas
	</div>
	<div class="panel-body">
		<form method="post">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label>Encargado</label>
				{{ Form::select('user_id', $assistants, null, ['class' => 'form-control']) }}
				@if ($errors->has('user_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('user_id') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Duracion</label>
				<select class="form-control" name="duration">
					<option value="45">45 minutos</option>
					<option value="60">60 minutos</option>
				</select>
				@if ($errors->has('duration'))
                <span class="help-block">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Intervalo</label>
				<select class="form-control" name="interval">
					<option value="0">0 minutos</option>
					<option value="15">15 minutos</option>
					<option value="30">30 minutos</option>
				</select>
				@if ($errors->has('duration'))
                <span class="help-block">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Departamento</label>
				{{ Form::select('state_id', $states, null, ['class' => 'form-control']) }}
				@if ($errors->has('state_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('state_id') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Lugar</label>
				<input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
				@if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea name="description" class="form-control">{{ old('description') }}</textarea>
				@if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 form-group">
					<label>Fecha de Inicio</label>
					<div class="input-group date">
						<input type="input" class="form-control datetimepicker" name="start_date" id="start_date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
					@if ($errors->has('start_date'))
                	<span class="help-block">
                    	<strong>{{ $errors->first('start_date') }}</strong>
                	</span>
                	@endif
				</div>
				<div class="col-xs-12 col-md-6 form-group">
					<label>Fecha de Fin</label>
					<div class="input-group date">
						<input type="input" class="form-control datetimepicker" name="end_date" id="end_date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
					@if ($errors->has('end_date'))
                	<span class="help-block">
                    	<strong>{{ $errors->first('end_date') }}</strong>
                	</span>
                	@endif
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Crear</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(function () {
        $('.datetimepicker').datetimepicker({
            'format' : 'YYYY-MM-DD HH:mm',
        });
    });
</script>
@endsection