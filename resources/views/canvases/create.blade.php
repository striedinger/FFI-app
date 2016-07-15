@extends('layouts.app')

@section('title')
    Crear Canvas
@endsection

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ url('/companies') }}">Empresas</a></li>
    <li><a href="{{ url('/companies') . '/view/' . $company->id }}">{{ $company->name }}</a></li>
    <li class="active">Crear Canvas</li>
</ol>
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Crear Canvas
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cuáles son las características de los consumidores / clientes?<br>- Si el mercado es empresarial, ¿cuáles son las características de las empresas clientes?<br>- ¿Quiénes son tus clientes?<br>- ¿Quiénes son los consumidores finales de tu producto o servicio?<br>- ¿Quién decide el consumo de sus productos o servicios?'})">Segmentos de Clientes <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="customer_segments" placeholder="Segmentos de Clientes">{{ old('customer_segments') }}</textarea>
						@if ($errors->has('customer_segments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_segments') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Esta identificado eso que nos hace diferente a la competencia?<br>- ¿Cuáles son las características y los beneficios del producto o servicio?<br>- ¿Tu producto o servicio es sustituto o competencia de otro?<br>- ¿Se entiende fácil tu propuesta de valor?<br>- ¿Cuáles son los competidores directos?<br>- ¿Cuál es tu ventaja competitiva?'})">Propuestas de Valor <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="value_propositions" placeholder="Propuestas de Valor">{{ old('value_propositions') }}</textarea>
						@if ($errors->has('value_propositions'))
                            <span class="help-block">
                                <strong>{{ $errors->first('value_propositions') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cuáles son los canales de distribución de tus productos / servicios?<br>- El producto / servicio ¿Cómo se entrega al cliente?<br>- En cuanto a comunicación ¿Cómo se llega a  los consumidores / clientes?'})">Canales de Distribucion <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="channels" placeholder="Canales de Distribucion">{{ old('channels') }}</textarea>
						@if ($errors->has('channels'))
                            <span class="help-block">
                                <strong>{{ $errors->first('channels') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué tipo de relaciones se establece con tus consumidores / Clientes?<br>- ¿Cómo sabes que tu oferta es valiosa para los consumidores / clientes?<br>- ¿Cuáles son los beneficios que influyen en el consumidor / cliente para que adquiera este producto o servicio?<br>- ¿Cuál es la percepción de los consumidores / clientes con respecto a los productos y servicios ofrecidos por ti?<br>- ¿Y qué opinan de tu competencia?<br>- ¿Cómo estudias el comportamiento de tus consumidores / clientes?'})">Relaciones con Clientes <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="customer_relationships" placeholder="Relaciones con Clientes">{{ old('customer_relationships') }}</textarea>
						@if ($errors->has('customer_relationships'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_relationships') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cual es el porcentaje de cada línea de ingreso respecto a los ingresos totales?<br>- ¿Por qué propuesta de valor están realmente pagando nuestros cliente ?<br>- ¿Con qué frecuencia se adquieren tus productos/servicios?<br>- ¿Se puede ofrecer tu producto / servicio en todas las épocas del año?<br>- ¿Cómo es la estructura de precios?'})">Fuentes de Ingresos <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="revenue_streams" placeholder="Fuentes de Ingresos">{{ old('revenue_streams') }}</textarea>
						@if ($errors->has('revenue_streams'))
                            <span class="help-block">
                                <strong>{{ $errors->first('revenue_streams') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué recursos clave requiere nuestra propuesta de valor?<br>- ¿Qué recursos clave requieren nuestros canales de distribución?<br>- ¿Qué recursos clave requiere la relación con el cliente?<br>- ¿Qué recursos clave requiere las fuentes de ingreso?'})">Recursos Clave <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="key_resources" placeholder="Recursos Clave">{{ old('key_resources') }}</textarea>
						@if ($errors->has('key_resources'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_resources') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué actividades desarrolla para identificar a los consumidores / clientes?<br>- ¿Qué actividades que realiza actualmente son clave  para establecer buenas relaciones con tus consumidores / clientes?<br>- Si aplica ¿Qué actividades son necesarias para desplegar las actividades de promoción?<br>- ¿Qué actividades son necesarias para desplegar las actividades de distribución?'})">Actividades Clave <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="key_activities" placeholder="Actividades Clave">{{ old('key_activities') }}</textarea>
						@if ($errors->has('key_activities'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_activities') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Quiénes son los proveedores clave?<br>- ¿Qué otros socios considera clave?<br>- ¿Tenemos relación activa con todos los aliados listados?<br>- ¿Cuál se ha convertido en el más importante?<br>- ¿Cuál no nos ha generado valor a nuestro Modelo de Negocio? ¿Por qué sigue en la lista?'})">Socios Clave <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="key_partners" placeholder="Socios Clave">{{ old('key_partners') }}</textarea>
						@if ($errors->has('key_partners'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_partners') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label onclick="swal({title: 'Por Ejemplo:', html: '- ¿Se presentan claramente los costes de fabricación / producción?<br>- ¿Cuáles son los costes más importantes de nuestro modelo de negocio?<br>- ¿Cuáles son los recursos clave y  actividades clave más caras?<br>- ¿Cuál es el margen bruto del producto / servicio?<br>- ¿Se han considerado todos los gastos?<br>- ¿Cuándo se presenta el punto de equilibrio?'})">Estructura de Costos <span class="fa fa-question-circle"></span></label>
						<textarea class="form-control" name="cost_structure" placeholder="Estructura de Costos">{{ old('cost_structure') }}</textarea>
						@if ($errors->has('cost_structure'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cost_structure') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Crear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function () {
        $('[data-toggle="tooltip"]').tooltip({html: true})
    })
</script>
@endsection