	@extends('layouts.app')

	@section('content')
	<ol class="breadcrumb">
  		<li><a href="{{ url('/companies') }}">Empresas</a></li>
  		<li class="active">Ver Empresa</li>
	</ol>
	<div>
		<div>
			<div class="row">
				<div class="col-sm-12 col-md-6">
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
								<label>Actividad y Sector Economico</label>
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
				<div class="col-sm-12 col-md-6" style="padding:0">
					{{--<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span onclick="swal('¿Modelo de Negocios Canvas?', 'Es una herramienta de análisis donde quedan reflejadas las fortalezas y debilidades de un modelo de negocio, proveyendo una visión global de este de manera rápida y sencilla.')">Modelo de Negocios Canvas <i class=" glyphicon glyphicon-question-sign"></i></span>
								<a href="{{ url('canvas/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
							</div>
							<div class="panel-body">
								@if(count($company->canvas)==0)
								<p>No hay ningun canvas creado.</p>
								@endif
								@if(count($company->canvas)>0)
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<th>ID</th>
											<th>Fecha de Modificacion</th>
											<th>Acción</th>
										</thead>
										<tbody>
											@foreach ($company->canvas as $canvas)
											<tr class="{{ $canvas->active ? 'success' : 'danger' }}">
												<td class="table-text">{{ $canvas->id }}</td>
												<td class="table-text">{{ $canvas->updated_at }}</td>
												<td><a href="{{ url('canvas/view') . '/' . $canvas->id }}">Ver</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								@endif
							</div>
						</div>
					</div>--}}
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span onclick="swal('¿ICAi?', 'El Instrumento de Caracterización de la Actividad Innovadora (ICAI) permite identificar los insumos, productos, resultados y comportamientos derivados de la actividad innovadora de las empresas evaluadas.')">Instrumento ICAi <i class=" glyphicon glyphicon-question-sign"></i></span>
								@if(count($company->icai)==0)
								{{--<a href="{{ url('icai/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>--}}
								@endif
							</div>
							<div class="panel-body">
								@if(count($company->icai)==0)
								<p>No hay ningun ICAi creado.</p>
								@endif
								@if(count($company->icai)>0)
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<th>ID</th>
											<th>Fecha de Modificacion</th>
											<th>Accion</th>
										</thead>
										<tbody>
											@foreach ($company->icai as $icai)
											<tr class="{{ $icai->active ? 'success' : 'danger' }}">
												<td class="table-text">{{ $icai->id }}</td>
												<td class="table-text">{{ $icai->updated_at }}</td>
												<td><a href="{{ url('icai/update') . '/' . $icai->id }}">Ver</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								@endif
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span onclick="swal('¿Miindex?', 'Es un instrumento diseñado para medir la percepción interna de la cultura de innovación.')">Instrumento Miindex <i class=" glyphicon glyphicon-question-sign"></i></span>
								@if(count($company->imi)==0)
								{{--<a href="{{ url('imi/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>--}}
								@endif
							</div>
							<div class="panel-body">
								@if(count($company->imi)==0)
								<p>No hay ningun Miindex creado.</p>
								@endif
								@if(count($company->imi)>0)
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<th>ID</th>
											<th>Fecha de Modificacion</th>
											<th>Acción</th>
										</thead>
										<tbody>
											@foreach ($company->imi as $imi)
											<tr class="{{ $imi->active ? 'success' : 'danger' }}">
												<td class="table-text">{{ $imi->id }}</td>
												<td class="table-text">{{ $imi->updated_at }}</td>
												<td><a href="{{ url('imi/update') . '/' . $imi->id }}">Ver</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								@endif
							</div>
						</div>
					</div>
					{{--<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ACAP <a href="{{ url('acap/create') . '/' . $company->id }}" class="pull-right"><i class="fa fa-plus"></i></a>
							</div>
							<div class="panel-body">
								@if(count($company->acap)>0)
								<div class="table-responsive">
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
								</div>
								@endif
							</div>
						</div>
					</div>--}}
				</div>
			</div>
		</div>
	</div>
	@endsection