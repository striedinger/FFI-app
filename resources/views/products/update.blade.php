@extends('layouts.app')

@section('title')
Producto
@endsection

@section('content')
<ol class="breadcrumb">
	<li><a href="{{ url('/projects') }}">Proyectos</a></li>
	<li><a href="{{ url('/projects/view') . '/' . $product->project->id . '#products'}}">Proyecto</a></li>
	<li class="active">Producto</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Producto
	</div>
	<div class="panel-body">
		<form method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $product->name }}">
				@if ($errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea class="form-control" name="description" placeholder="Descripcion">{{ $product->description }}</textarea>
				@if ($errors->has('description'))
				<span class="help-block">
					<strong>{{ $errors->first('description') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<label>Estado</label>
				<select class="form-control" name="state">
					<option value="Planeación" @if($product->state == 'Planeación') echo selected @endif>Planeación</option>
					<option value="Ejecución"  @if($product->state == 'Ejecución') echo selected @endif>Ejecución</option>
					<option value="Completado" @if($product->state == 'Completado') echo selected @endif>Completado</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
			</div>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Actividades
	</div>
	<div class="panel-body">
		@if(count($product->activities)==0)
		<p class="text-center">No existen actividades para este producto</p>
		@endif
		@if(count($product->activities)>0)
		@foreach($product->activities as $activity)
		<p>
			@can('destroy', $activity)
			{!! Form::open(['action' => array('ActivityController@destroy', $activity->id), 'method' => 'post'])!!}
			{{ method_field('DELETE') }}
			<button type="submit" class="pull-right close" onclick="return confirm('¿Esta seguro de querer borrar la actividad?');">&times;</button>
			{!! Form::close() !!}
			@endcan
			<a href="{{ url('/activities/update') . '/' . $activity->id }}">{{ $activity->name }}</a>
		</p>
		@endforeach
		@endif
	</div>
</div>
@endsection