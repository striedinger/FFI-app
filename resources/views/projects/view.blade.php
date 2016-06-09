@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/projects') }}">Proyectos</a></li>
    <li class="active">Ver Proyecto</li>
</ol>
<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Proyecto
			@can('update', $project)
			<a href=" {{ url('/projects/update') . '/' . $project->id }}" class="pull-right">Editar</a>
			@endcan
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label>Nombre</label>
				<p>{{$project->name}}</p>
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<p>{{$project->description}}</p>
			</div>
			<div class="form-group">
				<label>Monto Solicitado</label>
				<p>${{ number_format($project->amount) }} COP</p>
			</div>
			<div class="form-group">
				<label>Empresa</label>
				<p><a href="{{ url('companies/view') . '/' . $project->company->id }}">{{$project->company->name}}</a></p>
			</div>
			<div class="form-group">
				<label>Convocatoria</label>
				<p>{{$project->term->name}}</p>
			</div>
			<div class="form-group">
				<label>Administrador</label>
				<p><a href="{{ url('users/view') . '/' . $project->user->id }}">{{$project->user->name}}</a></p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Comentarios <button href="" class="btn btn-xs btn-default pull-right" data-toggle="modal" data-target="#commentModal"><i class="fa fa-pencil"></i></button>
			</div>
			<div class="panel-body">
				<div class="list-group">
					@if(count($project->comments)==0)
					<p>No hay comentarios para el proyecto</p>
					@endif
					@foreach ($project->comments as $comment)
					<div class="list-group-item">
						@if(Auth::user()->id==$comment->user_id)
						{!! Form::open(['action' => array('ProjectCommentController@destroy', $comment->id), 'method' => 'post'])!!}
							{{ method_field('DELETE') }}
							<button type="submit" class="pull-right close" onclick="return confirm('¿Esta seguro de querer borrar el comentario?');">&times;</button>
						{!! Form::close() !!}
						@endif
						<p>{{ $comment->comment }}</p>	
						<small>{{ date_format(date_create($comment->created_at), "h:i A d/m/y") }} por <a href="{{ url('users/view') . '/' . $comment->user->id }}">{{ $comment->user->name }}</a></small>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="commentModal">
	<div class="modal-dialog">
		<div class="modal-content">
			{!! Form::open(['action' => array('ProjectCommentController@create', $project->id), 'method' => 'post']) !!}
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="modal-header">
				<strong>Nuevo comentario</strong>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Comentario</label>
					<textarea class="form-control" name="comment" required>{{ old('comment') }}</textarea>
					@if ($errors->has('comment'))
                    <span class="help-block"> 
                    	<strong>{{ $errors->first('comment') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection