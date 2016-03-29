@extends('layouts.app')

@section('content')
<div>
	<div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Instrumento de Medicion de la Innovacón
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Empresa</label>
					<p><a href="{{ url('/companies/view') . '/' . $imi->company_id }}">{{ $imi->company->name }}</a></p>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-12 col-md-6 col-md-offset-3">
						<canvas id="myChart" width="300" height="300"></canvas>
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<form method="POST">
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<p><strong>Para cada una de las siguientes afirmaciones, Indique en las siguientes escalas el grado de acuerdo.</strong></p>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<th>
										Actividad
									</th>
									<th>
										Grado de acuerdo
									</th>
								</thead>
								<tbody>
									@for($i = 1; $i<=20; $i++)
									<tr>
										<td>
											{{ $i . '. ' . $questions[$i-1] }}
										</td>
										<td>
											<div class="form-group" style="padding:10px">
												<input type="hidden" name="{{ 'p' . $i }}" value="{{ $imi['p' . $i] }}" data-range>
											</div>
										</td>
									</tr>
									@endfor
								</tbody>
							</table>
						</div>
						<div class="form-group">
							<button class="btn btn-primary pull-right">Actualizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script type="text/javascript">
	var ctx = document.getElementById("myChart").getContext("2d");
	var data = {
		labels: ["Estrategia", "Procesos", "Organizacion", "Conexiones", "Aprendizaje"],
		datasets: [
		{
			label: "Datos",
			fillColor: "rgba(220,220,220,0.2)",
			strokeColor: "rgba(220,220,220,1)",
			pointColor: "rgba(220,220,220,1)",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(220,220,220,1)",
			data: [7, 7, 7, 7, 7]
		}
		]
	};
	var options = {
		scaleShowLabels: true,
		scaleSteps: 7,
		responsive: true,
		scaleBeginAtZero: true,
        scaleIntegersOnly: true,
        scaleOverride: true,
        scaleSteps: 7,
        scaleStepWidth: 1,
        scaleStartValue: 0
	};
	var myRadarChart = new Chart(ctx).Radar(data, options);

	function updateData(){
		var values = [];
		for(var i=1;i<=20;i++){
			values.push(parseFloat(document.getElementsByName("p"+i)[0].value));
		}
		myRadarChart.datasets[0].points[0].value = 7*(((values[0]+values[4]+values[13]+values[18])/4)/100);
		myRadarChart.datasets[0].points[1].value = 7*(((values[1]+values[9]+values[14]+values[17])/4)/100);
		myRadarChart.datasets[0].points[2].value = 7*(((values[3]+values[8]+values[10]+values[15])/4)/100);
		myRadarChart.datasets[0].points[3].value = 7*(((values[2]+values[5]+values[9]+values[11])/4)/100);
		myRadarChart.datasets[0].points[4].value = 7*(((values[8]+values[12]+values[16]+values[19])/4)/100);
		myRadarChart.update();
	}
	updateData();
  </script>
  <!-- Bootstrap Slider JavaScript -->
  <script src="{{ URL::asset('assets/js/jqueryrange/jquery.range.min.js') }}"></script>
  <script type="text/javascript">
  	var selector = '[data-range]';
  	var $element = $(selector);
  	$($element).jRange({
  		from: 0,
  		to: 100,
  		scale: [0,10,20,30,40,50,60,70,80,90,100],
  		showLabels: false,
  		ondragend: updateData
  	});
  </script>
  @endsection