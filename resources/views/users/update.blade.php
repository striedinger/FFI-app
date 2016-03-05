@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-offset-2 col-sm-8">
		@if(Session::has('status'))
		<div class="alert alert-success" align="center">
			<h2>{{ Session::get('status') }}</h2>
		</div>
		@endif
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
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection