@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-offset-2 col-sm-8">
		@if(Session::has('status'))
		<div class="alert alert-success" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<p>{{ Session::get('status') }}</p>
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
		<div class="panel panel-default">
			<div class="panel-heading">
				Modelo Canvas de Negocio <a href="{{ url('canvas/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($company->canvas)>0)
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Fecha de Modificacion</th>
						</thead>
						<tbody>
							@foreach ($company->canvas as $canvas)
							<tr class="{{ $canvas->active ? 'success' : 'danger' }}">
								<td class="table-text"><a href="{{ url('canvas/view') . '/' . $canvas->id }}">{{ $canvas->id }}</a></td>
								<td class="table-text">{{ $canvas->updated_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				ICAI <a href="{{ url('icai/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($company->icai)>0)
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Fecha de Modificacion</th>
						</thead>
						<tbody>
							@foreach ($company->icai as $icai)
							<tr class="{{ $icai->active ? 'success' : 'danger' }}">
								<td class="table-text"><a href="{{ url('icai/update') . '/' . $icai->id }}">{{ $icai->id }}</a></td>
								<td class="table-text">{{ $icai->updated_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				IMI <a href="{{ url('imi/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($company->imi)>0)
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Fecha de Modificacion</th>
						</thead>
						<tbody>
							@foreach ($company->imi as $imi)
							<tr class="{{ $imi->active ? 'success' : 'danger' }}">
								<td class="table-text"><a href="{{ url('imi/update') . '/' . $imi->id }}">{{ $imi->id }}</a></td>
								<td class="table-text">{{ $imi->updated_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				ACAP <a href="{{ url('acap/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					@if(count($company->acap)>0)
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Fecha de Modificacion</th>
						</thead>
						<tbody>
							@foreach ($company->acap as $acap)
							<tr class="{{ $acap->active ? 'success' : 'danger' }}">
								<td class="table-text"><a href="{{ url('acap/update') . '/' . $acap->id }}">{{ $acap->id }}</a></td>
								<td class="table-text">{{ $acap->updated_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection