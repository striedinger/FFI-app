@extends('layouts.app')

@section('title')
    Canvas
@endsection

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
<ol class="breadcrumb">
    <li><a href="{{ url('/companies') }}">Empresas</a></li>
    <li><a href="{{ url('/companies') . '/view/' . $canvas->company->id }}">{{ $canvas->company->name }}</a></li>
    <li class="active">Ver Canvas</li>
    @can('update', $canvas)
    <li><a href=" {{ url('/canvas/update') . '/' . $canvas->id }}" class="pull-right">Editar</a></li>
    @endcan
</ol>
<div id="canvasContainer">
	<div class="col-sm-12">
		<table id="bizcanvas" cellspacing="0" border="1">
			<!-- Upper part -->
			<tr>
				<td colspan="2" rowspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Quiénes son los proveedores clave?<br>- ¿Qué otros socios considera clave?<br>- ¿Tenemos relación activa con todos los aliados listados?<br>- ¿Cuál se ha convertido en el más importante?<br>- ¿Cuál no nos ha generado valor a nuestro Modelo de Negocio? ¿Por qué sigue en la lista?'})">Socios Clave <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->key_partners }}</p>
				</td>
				<td colspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué actividades desarrolla para identificar a los consumidores / clientes?<br>- ¿Qué actividades que realiza actualmente son clave  para establecer buenas relaciones con tus consumidores / clientes?<br>- Si aplica ¿Qué actividades son necesarias para desplegar las actividades de promoción?<br>- ¿Qué actividades son necesarias para desplegar las actividades de distribución?'})">Actividades Clave <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->key_activities }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Esta identificado eso que nos hace diferente a la competencia?<br>- ¿Cuáles son las características y los beneficios del producto o servicio?<br>- ¿Tu producto o servicio es sustituto o competencia de otro?<br>- ¿Se entiende fácil tu propuesta de valor?<br>- ¿Cuáles son los competidores directos?<br>- ¿Cuál es tu ventaja competitiva?'})">Propuestas de Valor <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->value_propositions }}</p>
				</td>
				<td colspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué tipo de relaciones se establece con tus consumidores / Clientes?<br>- ¿Cómo sabes que tu oferta es valiosa para los consumidores / clientes?<br>- ¿Cuáles son los beneficios que influyen en el consumidor / cliente para que adquiera este producto o servicio?<br>- ¿Cuál es la percepción de los consumidores / clientes con respecto a los productos y servicios ofrecidos por ti?<br>- ¿Y qué opinan de tu competencia?<br>- ¿Cómo estudias el comportamiento de tus consumidores / clientes?'})">Relaciones con Clientes <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->customer_relationships }}</p>
				</td>
				<td colspan="2" rowspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cuáles son las características de los consumidores / clientes?<br>- Si el mercado es empresarial, ¿cuáles son las características de las empresas clientes?<br>- ¿Quiénes son tus clientes?<br>- ¿Quiénes son los consumidores finales de tu producto o servicio?<br>- ¿Quién decide el consumo de sus productos o servicios?'})">Segmentos de Clientes <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->customer_segments }}</p>
				</td>
			</tr>
			<!-- Lower part -->
			<tr>
				<td colspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Qué recursos clave requiere nuestra propuesta de valor?<br>- ¿Qué recursos clave requieren nuestros canales de distribución?<br>- ¿Qué recursos clave requiere la relación con el cliente?<br>- ¿Qué recursos clave requiere las fuentes de ingreso?'})">Recursos Clave <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->key_resources }}</p>
				</td>
				<td colspan="2">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cuáles son los canales de distribución de tus productos / servicios?<br>- El producto / servicio ¿Cómo se entrega al cliente?<br>- En cuanto a comunicación ¿Cómo se llega a  los consumidores / clientes?'})">Canales de Distribucion <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->channels }}</p>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Se presentan claramente los costes de fabricación / producción?<br>- ¿Cuáles son los costes más importantes de nuestro modelo de negocio?<br>- ¿Cuáles son los recursos clave y  actividades clave más caras?<br>- ¿Cuál es el margen bruto del producto / servicio?<br>- ¿Se han considerado todos los gastos?<br>- ¿Cuándo se presenta el punto de equilibrio?'})">Estructura de Costos <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->cost_structure }}</p>
				</td>
				<td colspan="5">
					<h4 onclick="swal({title: 'Por Ejemplo:', html: '- ¿Cual es el porcentaje de cada línea de ingreso respecto a los ingresos totales?<br>- ¿Por qué propuesta de valor están realmente pagando nuestros cliente ?<br>- ¿Con qué frecuencia se adquieren tus productos/servicios?<br>- ¿Se puede ofrecer tu producto / servicio en todas las épocas del año?<br>- ¿Cómo es la estructura de precios?'})">Fuentes de Ingresos <span class="fa fa-question-circle"></span></h4>
					<p>{{ $canvas->revenue_streams }}</p>
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection