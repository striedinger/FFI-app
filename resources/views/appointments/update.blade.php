@extends('layouts.app')

@section('title')
    Editar Cita
@endsection

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/appointments') }}">Citas</a></li>
    <li><a href="{{ url('/appointments') . '/view/' . $appointment->id }}">Cita</a></li>
    <li class="active">Editar Cita</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Actualizar Cita de <a href="{{ url('users/view') . '/' . $appointment->user->id }}">{{ $appointment->user->name }}</a>
	</div>
	<div class="panel-body">
		<form method="post">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label>Comentario</label>
				<textarea class="form-control" name="assistant_comment">{{ $appointment->assistant_comment }}</textarea>
			</div>
			<div class="form-group">
				<label>Estado</label>
				<select class="form-control" name="status">
					<option value="Aceptada" @if($appointment->status=='Aceptada') echo selected @endif>Aceptada</option>
					<option value="Cancelada" @if($appointment->status=='Cancelada') echo selected @endif>Cancelada</option>
					<option value="Completada" @if($appointment->status=='Completada') echo selected @endif>Completada</option>
				</select>
			</div>
			<div class="form-group">
				<label>Activa</label>
				<select class="form-control" name="active">
					<option value="0" @if($appointment->active==0) echo selected @endif>No</option>
					<option value="1" @if($appointment->active==1) echo selected @endif>Si</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Actualizar</button>
			</div>
		</form>
	</div>
</div>
@endsection