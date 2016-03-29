@extends('layouts.app')

@section('content')
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Editar Canvas
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Empresa</label>
						<p><a href="{{ url('/companies/view') . '/' . $canvas->company_id }}">{{ $canvas->company->name }}</a></p>
					</div>
					<div class="form-group">
						<label>Segmentos de Clientes</label>
						<textarea class="form-control" name="customer_segments" placeholder="Segmentos de Clientes">{{ $canvas->customer_segments }}</textarea>
						@if ($errors->has('customer_segments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_segments') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Propuestas de Valor</label>
						<textarea class="form-control" name="value_propositions" placeholder="Propuestas de Valor">{{ $canvas->value_propositions }}</textarea>
						@if ($errors->has('value_propositions'))
                            <span class="help-block">
                                <strong>{{ $errors->first('value_propositions') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Canales de Distribucion</label>
						<textarea class="form-control" name="channels" placeholder="Canales de Distribucion">{{ $canvas->channels }}</textarea>
						@if ($errors->has('channels'))
                            <span class="help-block">
                                <strong>{{ $errors->first('channels') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Relaciones con Clientes</label>
						<textarea class="form-control" name="customer_relationships" placeholder="Relaciones con Clientes">{{ $canvas->customer_relationships }}</textarea>
						@if ($errors->has('customer_relationships'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_relationships') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Fuentes de Ingresos</label>
						<textarea class="form-control" name="revenue_streams" placeholder="Fuentes de Ingresos">{{ $canvas->revenue_streams }}</textarea>
						@if ($errors->has('revenue_streams'))
                            <span class="help-block">
                                <strong>{{ $errors->first('revenue_streams') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Recursos Clave</label>
						<textarea class="form-control" name="key_resources" placeholder="Recursos Clave">{{ $canvas->key_resources }}</textarea>
						@if ($errors->has('key_resources'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_resources') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Actividades Clave</label>
						<textarea class="form-control" name="key_activities" placeholder="Actividades Clave">{{ $canvas->key_activities }}</textarea>
						@if ($errors->has('key_activities'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_activities') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Socios Clave</label>
						<textarea class="form-control" name="key_partners" placeholder="Socios Clave">{{ $canvas->key_partners }}</textarea>
						@if ($errors->has('key_partners'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_partners') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Estructura de Costos</label>
						<textarea class="form-control" name="cost_structure" placeholder="Estructura de Costos">{{ $canvas->cost_structure }}</textarea>
						@if ($errors->has('cost_structure'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cost_structure') }}</strong>
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