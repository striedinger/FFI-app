@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
	@if(Auth::user()->isAdmin())
  	<li><a href="{{ url('/users') }}">Usuarios</a></li>
  	@endif
  	<li><a href="{{ url('/users') . '/view/' . $user->id }}">{{ $user->name }}</a></li>
  	<li class="active">Ver Usuario</li>
</ol>
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Usuario
				@can('update', $user)
				<a href=" {{ url('/users/update') . '/' . $user->id }}" class="pull-right">Editar</a>
				@endcan
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>E-mail</label>
					<p>{{$user->email}}</p>
				</div>
				<div class="form-group">
					<label>Nombre</label>
					<p>{{$user->name}}</p>
				</div>
				<div class="form-group">
					<label>Telefono</label>
					<p>{{$user->phone}}</p>
				</div>
				<div class="form-group">
					<label>Departamento</label>
					<p>{{$user->state->name}}</p>
				</div>
				<div class="form-group">
					<label>Ciudad</label>
					<p>{{$user->city}}</p>
				</div>
				<div class="form-group">
					<label>Rol</label>
					<p>{{ $user->role->name }}</p>
				</div>
			</div>
		</div>
		@if(count($user->companies)>0)
		<div class="panel panel-default">
			<div class="panel-heading">
				Empresas
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped project-table">
						<thead>
							<th>Empresa</th>
							<th>Ciudad</th>
							<th>Departamento</th>
							<th>Administrador</th>
						</thead>
						<tbody>
							@foreach ($user->companies as $company)
							<tr class="{{ $company->active ? 'success' : 'danger' }}">
								<td class="table-text"><a href="{{ url('companies/view') . '/' . $company->id }}">{{ $company->name }}</a></td>
								<td class="table-text">{{$company->city}}</td>
								<td class="table-text">{{$company->state->name}}</td>
								<td class="table-text">{{$company->user->name}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection