@extends('layouts.app')

@section('title')
    Editar Empresa
@endsection

@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/companies') }}">Empresas</a></li>
  <li><a href="{{ url('/companies') . '/view/' . $company->id }}">{{ $company->name }}</a></li>
  <li class="active">Editar Empresa</li>
</ol>
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Empresa
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>NIT</label>
						<input type="text" class="form-control" name="nit" placeholder="NIT" value="{{ $company->nit }}">
						@if ($errors->has('nit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nit') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $company->name }}">
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Actividad y Sector Economico</label>
						<textarea class="form-control" name="description" placeholder="Actividad y Sector Economico">{{ $company->description }}</textarea>
						@if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Departamento</label>
						{{ Form::select('state', $states, $company->state_id, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>Ciudad</label>
						<input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ $company->city }}">
						@if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Direccion</label>
						<input type="text" class="form-control" name="address" placeholder="Address" value="{{ $company->address }}">
						@if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
					</div>
					@if(Auth::user()->isAdmin())
					<div class="form-group">
						<label>Priorizada</label>
						<select class="form-control" name="priority">
							<option value="0" @if($company->priority==0) echo selected @endif>No</option>
							<option value="1" @if($company->priority==1) echo selected @endif>Si</option>
						</select>
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