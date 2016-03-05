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
				Empresa
				@can('update', $company)
				<a href=" {{ url('/companies/update') . '/' . $company->id }}" class="pull-right">Editar</a>
				@endcan
			</div>
			<div class="panel-body">
					<div class="form-group">
						<label>NIT</label>
						<p>{{$company->nit}}</p>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<p>{{$company->name}}</p>
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<p>{{$company->description}}</p>
					</div>
					<div class="form-group">
						<label>Departamento</label>
						<p>{{$company->state->name}}</p>
					</div>
					<div class="form-group">
						<label>Ciudad</label>
						<p>{{$company->city}}</p>
					</div>
					<div class="form-group">
						<label>Direccion</label>
						<p>{{$company->address}}</p>
					</div>
					<div class="form-group">
						<label>Administrador</label>
						<p><a href="{{ url('users/view') . '/' . $company->user->id }}">{{$company->user->name}}</a></p>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection