@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-12">
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
				ACAP
			</div>
			<div class="panel-body">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
					<label>Empresa</label>
						<p><a href="{{ url('/companies/view') . '/' . $company->id }}">{{ $company->name }}</a></p>
					</div>
					<form method="POST">
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li role="presentation" class="active">
								<a href="#section1" role="tab" data-toggle="tab">Seccion 1</a>
							</li>
							<li role="presentation" id="myTab">
								<a href="#section2">Seccion 2</a>
							</li>
							<li role="presentation" id="myTab">
								<a href="#section3">Seccion 3</a>
							</li>
							<li role="presentation" id="myTab">
								<a href="#section4">Seccion 4</a>
							</li>
							<li role="presentation" id="myTab">
								<a href="#section5">Seccion 5</a>
							</li>
							<li role="presentation" id="myTab">
								<a href="#section6">Seccion 6</a>
							</li>
						</ul>
						<div class="tab-content">
    						<div role="tabpanel" class="tab-pane fade in active" id="section1">
    							<br>
    							<p>1.	Está de acuerdo con las siguientes afirmaciones:</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 1; $i<=18; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane fade" id="section2">
    							<br>
    							<p>2. En cuanto a la captación de información. Está de acuerdo con las siguientes afirmaciones</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 19; $i<=24; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane fade" id="section3">
    							<br>
    							<p>3. En cuanto a la asimilación de información. Está de acuerdo con las siguientes afirmaciones</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 25; $i<=28; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane fade" id="section4">
    							<br>
    							<p>4. En cuanto a la trasformación de información. Está de acuerdo con las siguientes afirmaciones</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 29; $i<=32; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane fade" id="section5">
    							<br>
    							<p>5. En cuanto a la explotación de información. Está de acuerdo con las siguientes afirmaciones</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 33; $i<=36; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane fade" id="section6">
    							<br>
    							<p>6. Indique con qué frecuencia se relaciona con los siguientes agentes para el desarrollo de actividades de innovación</p>
    							<p>1 = Nada de acuerdo; 7= Totalmente de acuerdo</p>
    							<div class="table-responsive">
    								<table class="table table-striped">
    									<thead>
											<th>
												Afirmación
											</th>
											<th>
												Escala
											</th>
										</thead>
										<tbody>
											@for($i = 37; $i<=44; $i++)
											<tr>
												<td width="60%">
													{{ $i . '. ' . $questions[$i - 1] }}
												</td>
												<td width="40%">
													@for($j=1;$j<=7;$j++)
													<label class="radio-inline"><input type="radio" name="{{ 'p' . $i }}" value="{{ $j }}" @if($j==4) checked @endif> {{ $j }}</label>
													@endfor
												</td>
											</tr>
											@endfor
										</tbody>
    								</table>
    							</div>
    						</div>
  						</div>
						<div class="form-group">
							<button class="btn btn-primary pull-right">Finalizar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#myTab a').click(function (e) {
   		e.preventDefault()
   		$(this).tab('show')
	})
</script>
@endsection