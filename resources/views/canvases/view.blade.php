@extends('layouts.app')

@section('content')
<style type="text/css">
	#bizcanvas {
		border: 3px solid black;
		width: 100%;
	}

	#bizcanvas td {
		vertical-align: top;
		height: 200px;
		width: 200px;
		padding: 6px;
	}


	#bizcanvas H4 {
		font-weight: 700;
		font-size: 1em;
	}

	#bizcanvas H5 {
		font-weight: 700;
		font-size: 0.7em;
	}

	#bizcanvas p {
		font-weight: 300;
		font-size: 0.8em;
	}

</style>
<div id="canvasContainer">
	<div class="col-sm-12">
		@if(Session::has('status'))
         <div class="alert alert-success" align="center">
           	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
    		</button>
            <p>{{ Session::get('status') }}</p>
        </div>
        @endif
		<p><strong>Empresa: </strong><a href="{{ url('/companies/view') . '/' . $canvas->company_id }}">{{ $canvas->company->name }}</a>
		@can('update', $canvas)
			<a href=" {{ url('/canvas/update') . '/' . $canvas->id }}" class="pull-right">Editar</a>
		@endcan
		</p>
		<table id="bizcanvas" cellspacing="0" border="1">
			<!-- Upper part -->
			<tr>
				<td colspan="2" rowspan="2">
					<h4>Socios Clave</h4>
					<p>{{ $canvas->key_partners }}</p>
				</td>
				<td colspan="2">
					<h4>Actividades Clave</h4>
					<p>{{ $canvas->key_activities }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4>Propuestas de Valor</h4>
					<p>{{ $canvas->value_propositions }}</p>
				</td>
				<td colspan="2">
					<h4>Relaciones con Clientes</h4>
					<p>{{ $canvas->customer_relationships }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4>Segmentos de Clientes</h4>
					<p>{{ $canvas->customer_segments }}</p>
				</td>
			</tr>
			<!-- Lower part -->
			<tr>
				<td colspan="2">
					<h4>Recursos Clave</h4>
					<p>{{ $canvas->key_resources }}</p>
				</td>
				<td colspan="2">
					<h4>Canales</h4>
					<p>{{ $canvas->channels }}</p>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<h4>Estructuras de Costos</h4>
					<p>{{ $canvas->cost_structure }}</p>
				</td>
				<td colspan="5">
					<h4>Fuentes de Ingresos</h4>
					<p>{{ $canvas->revenue_streams }}</p>
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection