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
			<h2>{{ Session::get('status') }}</h2>
		</div>
		@endif
		<p><strong>Proyecto: </strong><a href="{{ url('/projects/view') . '/' . $canvas->project_id }}">{{ $canvas->project->name }}</a>
		@can('update', $canvas)
			<a href=" {{ url('/canvas/update') . '/' . $canvas->id }}" class="pull-right">Editar</a>
		@endcan
		</p>
		<table id="bizcanvas" cellspacing="0" border="1">
			<!-- Upper part -->
			<tr>
				<td colspan="2" rowspan="2">
					<h4>Key Partners</h4>
					<p>{{ $canvas->key_partners }}</p>
				</td>
				<td colspan="2">
					<h4>Key Activities</h4>
					<p>{{ $canvas->key_activities }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4>Value Proposition</h4>
					<p>{{ $canvas->value_propositions }}</p>
				</td>
				<td colspan="2">
					<h4>Customer Relationship</h4>
					<p>{{ $canvas->customer_relationships }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4>Customer Segments</h4>
					<p>{{ $canvas->customer_segments }}</p>
				</td>
			</tr>
			<!-- Lower part -->
			<tr>
				<td colspan="2">
					<h4>Key Resources</h4>
					<p>{{ $canvas->key_resources }}</p>
				</td>
				<td colspan="2">
					<h4>Channels</h4>
					<p>{{ $canvas->channels }}</p>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<h4>Cost Structure</h4>
					<p>{{ $canvas->cost_structure }}</p>
				</td>
				<td colspan="5">
					<h4>Revenue Streams</h4>
					<p>{{ $canvas->revenue_streams }}</p>
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection