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
				Registrar Empresa
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>NIT</label>
						<input type="text" class="form-control" name="nit" placeholder="NIT" value="{{ old('nit') }}">
						@if ($errors->has('nit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nit') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<textarea class="form-control" name="description" placeholder="Descripcion">{{ old('description') }}</textarea>
						@if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Departamento</label>
						{{ Form::select('state', $states, null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>Ciudad</label>
						<input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ old('city') }}">
						@if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Direccion</label>
						<input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">
						@if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Registrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection