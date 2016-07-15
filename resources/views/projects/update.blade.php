@extends('layouts.app')

@section('title')
    Editar Proyecto
@endsection

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/projects') }}">Proyectos</a></li>
    <li><a href="{{ url('/projects') . '/view/' . $project->id }}">Proyecto</a></li>
    <li class="active">Editar Proyecto</li>
</ol>
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Proyecto
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Empresa</label>
						<p><a href="{{ url('/companies') . '/view/' . $project->company->id }}">{{ $project->company->name }}</a></p>
					</div>
					<div class="form-group">
						<label>Convocatoria</label>
						<p>{{ $project->term->name }}</p>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $project->name }}">
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<textarea class="form-control" name="description" placeholder="Descripcion">{{ $project->description }}</textarea>
						@if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Valor del Proyecto</label>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="text" class="form-control" name="amount" placeholder="Valor del Proyecto" value="{{ $project->amount }}">
							<span class="input-group-addon">COP</span>
						</div>
						@if ($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection