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