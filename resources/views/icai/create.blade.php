@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-12">
		@if(Session::has('status'))
		<div class="alert alert-success" align="center">
			<h2>{{ Session::get('status') }}</h2>
		</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading">
				ICAI
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div clas="row">
						<div class="col-md-3">
							<ul class="nav nav-pills nav-stacked" id="myTab">
      							<li class="active"><a href="#section1">Identificación de la Empresa</a></li>
      							<li><a href="#section2">Datos del Informante</a></li>
      							<li><a href="#section3">Características Básicas de la Empresa</a></li>
      							<li><a href="#section4">Innovación de Producto</a></li>
      							<li><a href="#section5">Innovación en Procesos</a></li>
      							<li><a href="#section6">Innovación Organizacional</a></li>
      							<li><a href="#section7">Innovación en Marketing</a></li>
      							<li><a href="#section8">Actividades de Innovación</a></li>
      							<li><a href="#section9">Objetivos y Efectos</a></li>
      							<li><a href="#section10">Obstáculos a la Innovación</a></li>
      							<li><a href="#section11">Actividad Relacional</a></li>
    						</ul>
						</div>
						<div class="col-md-9">
							<div class="tab-content">
								<!--Seccion 1-->
      							<div class="tab-pane fade in active" id="section1">
      								<div class="form-group">
										<label>Nombre de la Empresa</label>
										<input class="form-control" name="p1" value="{{ old('p1') }}" placeholder="Nombre de la Empresa">
										@if ($errors->has('p1'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p1') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Numero de Identificación Tributaria</label>
										<input class="form-control" name="p2" value="{{ old('p2') }}" placeholder="Numero de Identificación Tributaria">
										@if ($errors->has('p2'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p2') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Año de fundación de la empresa</label>
										<div class="input-group">
											<input class="form-control" name="p3" value="{{ old('p3') }}" placeholder="">
											<div class="input-group-addon" onclick="alert('hi')"><span class="fa fa-calendar"></span></div>
										</div>
										@if ($errors->has('p3'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p3') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>¿Es una empresa familiar?</label><br>
										<label>
    										<input type="radio" name="p4" value="Si">
    										Si &nbsp;
  										</label>
										<label>
    										<input type="radio" name="p4" value="No">
    										No
  										</label>
										@if ($errors->has('p4'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p4') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Nivel de formación del gerente</label>
										<select class="form-control" name="p5">
											<option value="Básica Primaria">Básica Primaria</option>
											<option value="Básica Secundaria">Básica Secundaria</option>
											<option value="Técnica Profesional">Técnica Profesional</option>
											<option value="Tecnológica">Tecnológica</option>
											<option value="Profesional Universitario">Profesional Universitario</option>
											<option value="Especialización">Especialización</option>
											<option value="Maestría">Maestría</option>
											<option value="Doctorado">Doctorado</option>
										</select>
										@if ($errors->has('p5'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p5') }}</strong>
                            			</span>
                        				@endif
									</div>
      							</div>
      							<!-- Seccion 2-->
      							<div class="tab-pane fade" id="section2">
      								<div class="form-group">
										<label>Nombre</label>
										<input class="form-control" name="p6" value="{{ old('p6') }}" placeholder="Nombre">
										@if ($errors->has('p6'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p6') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Nivel de educacion máximo alcanzado</label>
										<select class="form-control" name="p7">
											<option value="Básica Primaria">Básica Primaria</option>
											<option value="Básica Secundaria">Básica Secundaria</option>
											<option value="Técnica Profesional">Técnica Profesional</option>
											<option value="Tecnológica">Tecnológica</option>
											<option value="Profesional Universitario">Profesional Universitario</option>
											<option value="Especialización">Especialización</option>
											<option value="Maestría">Maestría</option>
											<option value="Doctorado">Doctorado</option>
										</select>
										@if ($errors->has('p7'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p7') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Cargo</label>
										<input class="form-control" name="p8" value="{{ old('p8') }}" placeholder="Cargo">
										@if ($errors->has('p8'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p8') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Telefono</label>
										<input class="form-control" name="p9" value="{{ old('p9') }}" placeholder="Telefono">
										@if ($errors->has('p9'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p9') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input class="form-control" name="p10" value="{{ old('p10') }}" placeholder="E-mail">
										@if ($errors->has('p10'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p10') }}</strong>
                            			</span>
                        				@endif
									</div>
      							</div>
      							<!-- Seccion 3-->
      							<div class="tab-pane fade" id="section3">
      								<div class="form-group">
      									<label>¿Cuál de estos sectores (CIIU Rev. 4) representa principalmente la actividad económica principal de su empresa?</label>
										<select class="form-control" name="p11">
											@foreach($sectors as $sector)
											<option value="{{ $sector['rev'] }}">{{ $sector['rev'] . ' - ' . $sector['desc'] }}</option>
											@endforeach
										</select>
      								</div>
      								<div class="form-group">
										<label>Monto de ventas nacionales (miles de pesos corrientes) en el año 2015</label>
										<input class="form-control" name="p12" value="{{ old('p12') }}" placeholder="">
										@if ($errors->has('p12'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p12') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>En los últimos tres años las ventas de su empresa han:</label><br>
										<label>
    										<input type="radio" name="p13" value="Aumentado">
    										Aumentado &nbsp;
  										</label>
										<label>
    										<input type="radio" name="p13" value="Disminuido">
    										Disminuido &nbsp;
  										</label>
  										<label>
    										<input type="radio" name="p13" value="Se han mantenido constantes">
    										Se han mantenido constantes
  										</label>
										@if ($errors->has('p13'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p13') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>¿Su empresa ha exportado en los últimos 2 años?</label><br>
										<label>
    										<input type="radio" name="p14" value="Si">
    										Si &nbsp;
  										</label>
										<label>
    										<input type="radio" name="p14" value="No">
    										No
  										</label>
										@if ($errors->has('p14'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p14') }}</strong>
                            			</span>
                        				@endif
									</div>
									<div class="form-group">
										<label>Ordene en importancia el mercado geográfico de las ventas de bienes o servicios de su empresa (Mas importante primero)</label>
										<select class="form-control" name="p15">
											@foreach($markets as $market)
											<option>{{ $market }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Número de empleados (promedio anual) del año 2014 (incluyendo empleados con contrato laboral y de prestación de servicio)</label>
										<input class="form-control" name="p16" value="{{ old('p16') }}" placeholder="">
										@if ($errors->has('p16'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p16') }}</strong>
                            			</span>
                        				@endif
									</div>
      							</div>
      							<!-- Seccion 4-->
      							<div class="tab-pane fade" id="section4">
      								<div class="form-group">
      									<label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
      									<div class="table-responsive">
      										<table class="table table-bordered table-striped">
      											<thead>
      												<th>
      												</th>
      												<th style="text-align:center">
      													Si
      												</th>
      											</thead>
      											<tbody>
      												<tr>
      													<td>
      														Bienes nuevos
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p17">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Bienes significativamente mejorados
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p18">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Servicios nuevos
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p19">
    															</label>
  															</div>
      													</td>
      												</tr>
      											</tbody>
      										</table>
      									</div>
      								</div>
      								<div class="form-group">
      									<label>Durante el periodo 2014 - 2015 tuvo su negocio alguna actividad de innovación en estado:</label>
      									<label class="checkbox-inline">
 	 										<input type="checkbox" name="p20"> Abandonada
										</label>
										<label class="checkbox-inline">
 	 										<input type="checkbox" name="p21"> Aún en marcha al final del año 2015
										</label>
      								</div>
      							</div>
      							<!-- Seccion 5-->
      							<div class="tab-pane fade" id="section5">
      								<div class="form-group">
      									<label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
      									<div class="table-responsive">
      										<table class="table table-bordered table-striped">
      											<thead>
      												<th>
      												</th>
      												<th style="text-align:center">
      													Si
      												</th>
      											</thead>
      											<tbody>
      												<tr>
      													<td>
      														Un nuevo método de manufactura o de producción de bienes y servicios <div class="btn-xs" onclick="swal('Por Ejemplo:', ' Automatización de procesos manuales, sistemas de envasado automático, instalación de un diseño asistido por ordenador para el desarrollo de un producto…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p22">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Un nuevo método de logística, entrega o distribución para sus insumos, bienes o servicios
      														<div class="btn-xs" onclick="swal('Por Ejemplo:', 'Sistemas de pedidos, sistemas de minimización de stocks, sistemas logísticos de transporte…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div> 
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p23">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Una nueva actividad de apoyo para sus procesos, tales como sistema de mantenimiento u operaciones de compra, contabilidad o informática <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Sistemas de información y gestión, sistemas de gestión de contabilidad, sistemas tipo SAP…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p24">
    															</label>
  															</div>
      													</td>
      												</tr>
      											</tbody>
      										</table>
      									</div>
      								</div>
      							</div>
      							<!-- Seccion 6 -->
      							<div class="tab-pane fade" id="section6">
      								<div class="form-group">
      									<label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
      									<div class="table-responsive">
      										<table class="table table-bordered table-striped">
      											<thead>
      												<th>
      												</th>
      												<th style="text-align:center">
      													Si
      												</th>
      											</thead>
      											<tbody>
      												<tr>
      													<td>
      														Nuevas prácticas en la organización del trabajo o procedimientos de la empresa <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Gestión de la cadena de suministro, sistemas de gestión del conocimiento, reingeniería de negocios, producción eficiente, sistemas de educación y formación…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p25">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Nuevos métodos de organizar los lugares de trabajo para mejorar el reparto de responsabilidades y la toma de decisiones
      														<div class="btn-xs" onclick="swal('Por Ejemplo:', 'Uso por primera vez de un nuevo sistema de reparto de responsabilidades entre los empleados, gestión de equipos de trabajo, descentralización, reestructuración de departamentos…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div> 
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p26">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Nuevos métodos de gestión de relaciones externas con otras empresas o instituciones públicas <div class="btn-xs" onclick="swal('Por Ejemplo:', 'La creación por primera vez de alianzas, asociaciones, externalización o subcontratación')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p27">
    															</label>
  															</div>
      													</td>
      												</tr>
      											</tbody>
      										</table>
      									</div>
      								</div>
      							</div>
      							<!-- Seccion 7 -->
      							<div class="tab-pane fade" id="section7">
      								<div class="form-group">
      									<label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
      									<div class="table-responsive">
      										<table class="table table-bordered table-striped">
      											<thead>
      												<th>
      												</th>
      												<th style="text-align:center">
      													Si
      												</th>
      											</thead>
      											<tbody>
      												<tr>
      													<td>
      														Cambios significativos en el diseño, envase y embalaje de bienes y servicios <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Se excluyen los cambios que alteran la funcionalidad o características de uso del producto')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p28">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Nuevos medios o técnicas para la promoción del producto
      														<div class="btn-xs" onclick="swal('Por Ejemplo:', 'Uso por primera vez de un nuevo canal publicitario, fundamentalmente marcas nuevas con el objetivo de introducirse en nuevos mercados, introducción de tarjetas de fidelización de clientes…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div> 
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p29">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Nuevos métodos o canales de venta para el posicionamiento del producto en el mercado <div class="btn-xs" onclick="swal('Por Ejemplo:', 'El uso por primera vez de franquiciado o licencias de distribución, venta directa, venta al por menor en exclusiva, nuevos conceptos para la presentación del producto…')"><i class=" glyphicon glyphicon-plus-sign"></i> Ejemplo</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p30">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														Nuevos métodos de fijación de precios de los bienes y servicios
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p31">
    															</label>
  															</div>
      													</td>
      												</tr>
      											</tbody>
      										</table>
      									</div>
      								</div>
      							</div>
      							<!-- Seccion 8-->
      							<div class="tab-pane fade" id="section8">
      								<div class="form-group">
      									<label>Indique si ha invertido en alguna de las siguientes actividades de innovación durante el periodo 2014-2015, anotando las respectivas fuentes de financiación utilizadas</label>
      									<div class="table-responsive">
      										<table class="table table-bordered table-striped">
      											<thead>
      												<th>
      													Actividad
      												</th>
      												<th>
      													Recursos Propios
      												</th>
      												<th>
      													Banca Privada
      												</th>
      												<th>
      													Banca Pública
      												</th>
      												<th>
      													Otros Recursos
      												</th>
      											</thead>
      											<tbody>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Trabajos de creación sistemáticos llevados a cabo dentro de la empresa con el fin de aumentar el volumen de conocimientos y su utilización para idear bienes, servicios, o procesos nuevos o mejorados">
      															Actividades de I+D Internas 
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p32">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p33">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p34">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p35">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Adquisición o financiación de las mismas actividades que las arriba indicadas (I+D) pero realizadas por otras organizaciones públicas o privadas (incluye organismos de investigación)">
      															Adquisición de I+D (externa)
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p36">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p37">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p38">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p39">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Maquinaria y equipo, específicamente comprado para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados (No incluir aquellos registrados en I+D, item 1)">
      															Adquisición de maquinaria y equipo
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p40">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="41">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p42">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p43">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Adquisición, generación, outsourcing o arriendo de elementos de hardware, software y/o servicios para el manejo o procesamiento de la información, específicamente destinados a la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados">
      															Tecnologías de información y telecomunicaciones
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p44">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="45">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p46">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p47">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Actividades de introducción en el mercado de bienes o servicios nuevos o significativamente mejorados, incluye investigación de mercado y publicidad de lanzamiento">
      															Mercadeo de innovaciones
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p48">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="49">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p50">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p51">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Adquisición o uso bajo licencia, de patentes u otros registros de propiedad intelectual, de inventos no patentados y conocimientos técnicos o de otro tipo; de otras empresas u organizaciones para utilizar en las innovaciones de su empresa">
      															Transferencia de tecnología
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p52">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p53">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p54">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p55">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Asesorías para la utilización de conocimientos tecnológicos aplicados, por medio del ejercicio de un arte o técnica, específicamente contratadas para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados. Incluye inteligencia de mercados y vigilancia tecnológica">
      															Asistencia técnica y consultoría
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p56">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p57">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p58">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p59">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Cambios en los métodos o patrones de producción y control de calidad, y elaboración de planos y diseños orientados a definir procedimientos técnicos, necesarios para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados en la empresa">
      															Ingeniería y diseño industrial
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p60">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p61">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p62">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p63">
    															</label>
  															</div>
      													</td>
      												</tr>
      												<tr>
      													<td>
      														<div data-toggle="tooltip" title="Formación a nivel de maestría y doctorado, y capacitación que involucra un grado de complejidad significativo (requiere de un personal capacitador altamente especializado). Se incluye la realizada mediante financiación con recursos de la empresa y la impartida directamente dentro de la empresa.">
      															Formación y capacitación especializada
      														</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p64">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p65">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p66">
    															</label>
  															</div>
      													</td>
      													<td align="center">
      														<div class="checkbox">
    															<label>
      																<input type="checkbox" name="p67">
    															</label>
  															</div>
      													</td>
      												</tr>
      											</tbody>
      										</table>
      									</div>
      								</div>
      								<div class="form-group">
      									<label>¿Su empresa cuenta con Departamento de I+D?</label><br>
      									<label>
    										<input type="radio" name="p68" value="Si">
    										Si &nbsp;
  										</label>
										<label>
    										<input type="radio" name="p68" value="No">
    										No
  										</label>
										@if ($errors->has('p68'))
                            			<span class="help-block">
                                			<strong>{{ $errors->first('p68') }}</strong>
                            			</span>
                        				@endif
      								</div>
      							</div>
    						</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<button class="btn btn-primary pull-right">Finalizar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection