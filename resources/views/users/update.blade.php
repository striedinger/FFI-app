@extends('layouts.app')

@section('title')
    Editar Usuario
@endsection

@section('content')
<ol class="breadcrumb">
	@if(Auth::user()->isAdmin())
  	<li><a href="{{ url('/users') }}">Usuarios</a></li>
  	@endif
  	<li><a href="{{ url('/users') . '/view/' . $user->id }}">{{ $user->name }}</a></li>
  	<li class="active">Editar Usuario</li>
</ol>
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Usuario
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>E-mail</label>
						<p>{{$user->email}}</p>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $user->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label>Telefono</label>
						<input type="text" class="form-control" name="phone" placeholder="Telefono" value="{{ $user->phone }}">
						@if ($errors->has('phone'))
						<span class="help-block">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label>Departamento</label>
						{{ Form::select('state', $states, $user->state_id, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>Ciudad</label>
						<input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ $user->city }}">
						@if ($errors->has('city'))
						<span class="help-block">
							<strong>{{ $errors->first('city') }}</strong>
						</span>
						@endif
					</div>
					@if(Auth::user()->isSuperAdmin())
					<div class="form-group">
						<label>Activo</label>
						<select class="form-control" name="active">
							<option value="0" @if($user->active==0) echo selected @endif>No</option>
							<option value="1" @if($user->active==1) echo selected @endif>Si</option>
						</select>
					</div>
					<div class="form-group">
						<label>Rol</label>
						{{ Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control']) }}
					</div>
					@endif
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection