@extends('layouts.app')

@section('title')
    Actividad
@endsection

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/projects') }}">Proyectos</a></li>
    <li><a href="{{ url('/projects/view') . '/' . $activity->product->project->id . '#activities'}}">Proyecto</a></li>
    <li><a href="{{ url('/products/update') . '/' . $activity->product->id }}">Producto</a></li>
    <li class="active">Actividad</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Actividad
	</div>
	<div class="panel-body">
		<form method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $activity->name }}">
				@if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea class="form-control" name="description" placeholder="Descripcion">{{ $activity->description }}</textarea>
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
						<input type="input" class="form-control datetimepicker" name="start_date" id="start_date" value="{{ $activity->start_date }}">
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
						<input type="input" class="form-control datetimepicker" name="end_date" id="end_date" value="{{ $activity->end_date }}">
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
				<label>Responsable</label>
				<input type="text" class="form-control" name="responsible" placeholder="Responsable" value="{{ $activity->responsible }}">
				@if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
			</div>
			<div class="form-group">
				<label>Actividad Predecesora</label>
				<select class="form-control" name="activity_id">
					<option value="0" @if($activity->activity_id == null) echo selected @endif>Ninguna</option>
					@foreach($activity->product->project->products as $product)
					<optgroup label="{{ $product->name }}">
						@foreach($product->activities as $activity1)
						@if($activity->id != $activity1->id)
						<option value="{{ $activity1->id }}" @if($activity->activity_id == $activity1->id) echo selected @endif>{{ $activity1->name }}</option>
						@endif
						@endforeach
					</optgroup>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(function () {
        $('.datetimepicker').datetimepicker({
            'format' : 'YYYY-MM-DD',
        });
    });
</script>
@endsection