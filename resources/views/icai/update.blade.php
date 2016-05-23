@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">ICAi - <a href="{{ url('/companies/view') . '/' . $icai->company_id }}">{{ $icai->company->name }}</a></div>
            <div class="panel-body">
                <form method="POST">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div clas="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-stacked" id="myTab">
                                <li class="active">
                                    <a href="#section1">Identificación de la Empresa</a>
                                </li>
                                <li>
                                    <a href="#section2">Datos del Informante</a>
                                </li>
                                <li>
                                    <a href="#section3">Características Básicas de la Empresa</a>
                                </li>
                                <li>
                                    <a href="#section4">Innovación de Producto</a>
                                </li>
                                <li>
                                    <a href="#section5">Innovación en Procesos</a>
                                </li>
                                <li>
                                    <a href="#section6">Innovación Organizacional</a>
                                </li>
                                <li>
                                    <a href="#section7">Innovación en Marketing</a>
                                </li>
                                <li>
                                    <a href="#section8">Actividades de Innovación</a>
                                </li>
                                <li>
                                    <a href="#section9">Objetivos y Efectos</a>
                                </li>
                                <li>
                                    <a href="#section10">Obstáculos a la Innovación</a>
                                </li>
                                <li>
                                    <a href="#section11">Actividad Relacional</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!--Seccion 1-->
                                <div class="tab-pane fade in active" id="section1">
                                    <div class="form-group">
                                        <label>Nombre de la Empresa</label>
                                        <input class="form-control" name="p1" value="{{ $icai->p1 }}" placeholder="Nombre de la Empresa" readonly>
                                        @if ($errors->has('p1'))
                                        <span class="help-block"> <strong>{{ $errors->first('p1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Identificación Tributaria</label>
                                        <input class="form-control" name="p2" value="{{ $icai->p2 }}" placeholder="Numero de Identificación Tributaria" readonly>
                                        @if ($errors->has('p2'))
                                        <span class="help-block"> <strong>{{ $errors->first('p2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Año de fundación de la empresa</label>
                                        <div class="input-group" id="datepicker">
                                            <input class="form-control" name="p3" value="{{ $icai->p3 }}" placeholder="">
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('p3'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>¿Es una empresa familiar?</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="p4" value="Si" @if($icai->p4=="Si")checked @endif> Si &nbsp;</label>
                                        <label>
                                            <input type="radio" name="p4" value="No" @if($icai->p4=="No")checked @endif> No</label>
                                        @if ($errors->has('p4'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Nivel de formación del gerente</label>
                                        <select class="form-control" name="p5">
                                            @foreach($education as $edu)
                                            <option value="{{ $edu }}" @if($icai->p5==$edu)selected @endif>{{ $edu }}</option>
                                            @endforeach
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
                                        <input class="form-control" name="p6" value="{{ $icai->p6 }}" placeholder="Nombre" readonly>
                                        @if ($errors->has('p6'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p6') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Nivel de educacion máximo alcanzado</label>
                                        <select class="form-control" name="p7">
                                            @foreach($education as $edu)
                                            <option value="{{ $edu }}" @if($icai->p7==$edu)selected @endif>{{ $edu }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('p7'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p7') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input class="form-control" name="p8" value="{{ $icai->p8 }}" placeholder="Cargo">
                                        @if ($errors->has('p8'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p8') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input class="form-control" name="p9" value="{{ $icai->p9 }}" placeholder="Telefono" readonly>
                                        @if ($errors->has('p9'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p9') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" name="p10" value="{{ $icai->p10 }}" placeholder="E-mail" readonly>
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
                                        <label>
                                            ¿Cuál de estos sectores (CIIU Rev. 4) representa principalmente la actividad económica principal de su empresa?
                                        </label>
                                        <input type="text" class="form-control" name="p11" value="{{ $icai->p11 }}" id="ciuu">
                                        @if ($errors->has('p11'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p11') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Monto de ventas nacionales (miles de pesos corrientes) en el año 2015
                                        </label>
                                        <input class="form-control" name="p12" value="{{ $icai->p12 }}" placeholder="">
                                        @if ($errors->has('p12'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p12') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>En los últimos tres años las ventas de su empresa han:</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="p13" value="Aumentado" @if($icai->p13=="Aumentado") checked @endif> Aumentado &nbsp;</label>
                                        <label>
                                            <input type="radio" name="p13" value="Disminuido" @if($icai->p13=="Disminuido") checked @endif> Disminuido &nbsp;</label>
                                        <label>
                                            <input type="radio" name="p13" value="Se han mantenido constantes" @if($icai->p13=="Se han mantenido constantes") checked @endif> Se han mantenido constantes</label>
                                        @if ($errors->has('p13'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p13') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>¿Su empresa ha exportado en los últimos 2 años?</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="p14" value="Si" @if($icai->p14=="Si") checked @endif> Si &nbsp;</label>
                                        <label>
                                            <input type="radio" name="p14" value="No" @if($icai->p14=="No") checked @endif> No</label>
                                        @if ($errors->has('p14'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p14') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Ordene en importancia el mercado geográfico de las ventas de bienes o servicios de su empresa (Mas importante primero)
                                        </label>
                                        <select class="form-control" name="p15">
                                            @foreach($markets as $market)
                                            <option @if($icai->p15==$market) selected @endif>{{ $market }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Número de empleados (promedio anual) del año 2015 (incluyendo empleados con contrato laboral y de prestación de servicio)
                                        </label>
                                        <input class="form-control" name="p16" value="{{ $icai->p16 }}" placeholder="">
                                        @if ($errors->has('p16'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p16') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Seccion 4-->
                                <div class="tab-pane fade" id="section4">
                                    <p><strong>Innovación de Producto: </strong>Innovar un producto consiste en introducir en el mercado de manera novedosa un bien o servicio, o introducir mejoras significativas a las características o usos de un bien o servicio ya existente (Manual de Oslo, 2005).</p>
                                    <p><strong>Nota: </strong>Diligencie esta sesión UNICAMENTE, si la empresa ha iniciado y/o ejecutado algún tipo de innovación en el período 2014-2015.</p>
                                    <div class="form-group">
                                        <label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th></th>
                                                    <th style="text-align:center">Si</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Bienes nuevos 
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'introducción de un bien que difiere significativamente desde el punto de vista de sus características o el uso al cual se destina, de los productos pre-existentes en la empresa (Manual de Oslo, 2005).')"> <i class=" glyphicon glyphicon-question-sign"></i> Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p17" value="0">
                                                                    <input type="checkbox" name="p17" value="1" @if($icai->p17=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bienes significativamente mejorados
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Las mejoras significativas de productos existentes se producen cuando se introducen cambios en los materiales, componentes u otras características que hacen que estos productos tengan un mejor rendimiento (Manual de Oslo, 2005). ')"> <i class=" glyphicon glyphicon-question-sign"></i> Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p18" value="0">
                                                                    <input type="checkbox" name="p18" value="1" @if($icai->p18=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Servicios nuevos
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Introducción de un servicio que difiere significativamente desde el punto de vista de la manera en que estos servicios se prestan (en términos de eficiencia y rapidez, por ejemplo) (Manual de Oslo, 2005).')"> <i class=" glyphicon glyphicon-question-sign"></i> Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                <input type="hidden" name="p19" value="0">
                                                                    <input type="checkbox" name="p19" value="1" @if($icai->p19=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Durante el periodo 2014 - 2015 tuvo su negocio alguna actividad de innovación en estado:
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="hidden" name="p20" value="0">
                                            <input type="checkbox" name="p20" value="1" @if($icai->p20=="1") checked @endif>Abandonada</label>
                                        <label class="checkbox-inline">
                                            <input type="hidden" name="p21" value="0">
                                            <input type="checkbox" name="p21" value="1" @if($icai->p21=="1") checked @endif>Aún en marcha al final del año 2015</label>
                                    </div>
                                </div>
                                <!-- Seccion 5-->
                                <div class="tab-pane fade" id="section5">
                                    <div class="form-group">
                                        <label>Durante el periodo 2014 - 2015 su empresa introdujo:</label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th></th>
                                                    <th style="text-align:center">Si</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Un nuevo método de manufactura o de producción de bienes y servicios
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', ' Automatización de procesos manuales, sistemas de envasado automático, instalación de un diseño asistido por ordenador para el desarrollo de un producto…')"> <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p22" value="0">
                                                                    <input type="checkbox" name="p22" value="1" @if($icai->p22=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Un nuevo método de logística, entrega o distribución para sus insumos, bienes o servicios
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Sistemas de pedidos, sistemas de minimización de stocks, sistemas logísticos de transporte…')"> <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p23" value="0">
                                                                    <input type="checkbox" name="p23" value="1" @if($icai->p23=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Una nueva actividad de apoyo para sus procesos, tales como sistema de mantenimiento u operaciones de compra, contabilidad o informática
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Sistemas de información y gestión, sistemas de gestión de contabilidad, sistemas tipo SAP…')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p24" value="0">
                                                                    <input type="checkbox" name="p24" value="1" @if($icai->p24=="1") checked @endif></label>
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
                                                    <th></th>
                                                    <th style="text-align:center">Si</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Nuevas prácticas en la organización del trabajo o procedimientos de la empresa
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Gestión de la cadena de suministro, sistemas de gestión del conocimiento, reingeniería de negocios, producción eficiente, sistemas de educación y formación…')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p25" value="0">
                                                                    <input type="checkbox" name="p25" value="1" @if($icai->p25=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nuevos métodos de organizar los lugares de trabajo para mejorar el reparto de responsabilidades y la toma de decisiones
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Uso por primera vez de un nuevo sistema de reparto de responsabilidades entre los empleados, gestión de equipos de trabajo, descentralización, reestructuración de departamentos…')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p26" value="0">
                                                                    <input type="checkbox" name="p26" value="1" @if($icai->p26=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nuevos métodos de gestión de relaciones externas con otras empresas o instituciones públicas
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'La creación por primera vez de alianzas, asociaciones, externalización o subcontratación')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p27" value="0">
                                                                    <input type="checkbox" name="p27" value="1" @if($icai->p27=="1") checked @endif></label>
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
                                                    <th></th>
                                                    <th style="text-align:center">Si</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Cambios significativos en el diseño, envase y embalaje de bienes y servicios
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Se excluyen los cambios que alteran la funcionalidad o características de uso del producto')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p28" value="0">
                                                                    <input type="checkbox" name="p28" value="1" @if($icai->p28=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nuevos medios o técnicas para la promoción del producto
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'Uso por primera vez de un nuevo canal publicitario, fundamentalmente marcas nuevas con el objetivo de introducirse en nuevos mercados, introducción de tarjetas de fidelización de clientes…')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p29" value="0">
                                                                    <input type="checkbox" name="p29" value="1" @if($icai->p29=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nuevos métodos o canales de venta para el posicionamiento del producto en el mercado
                                                            <div class="btn-xs" onclick="swal('Por Ejemplo:', 'El uso por primera vez de franquiciado o licencias de distribución, venta directa, venta al por menor en exclusiva, nuevos conceptos para la presentación del producto…')">
                                                                <i class=" glyphicon glyphicon-question-sign"></i>
                                                                Ejemplo
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p30" value="0">
                                                                    <input type="checkbox" name="p30" value="1" @if($icai->p30=="1") checked @endif></label>
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
                                                                    <input type="hidden" name="p31" value="0">
                                                                    <input type="checkbox" name="p31" value="1" @if($icai->p31=="1") checked @endif></label>
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
                                    <p><strong>Actividades de Innovación: </strong>las actividades innovadoras se corresponden con todas las operaciones científicas, tecnológicas, organizativas, financieras y comerciales que conducen efectivamente a la innovación (Manual de Oslo, 2005).</p>
                                    <div class="form-group">
                                        <label>¿Su empresa cuenta con Departamento de I+D?</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="p68" value="Si" @if($icai->p68=="Si") checked @endif> Si &nbsp;</label>
                                        <label>
                                            <input type="radio" name="p68" value="No" @if($icai->p68=="No") checked @endif> No</label>
                                        @if ($errors->has('p68'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('p68') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <p><strong>Nota: </strong>Diligenciar esta sesión UNICAMENTE, si la empresa ha iniciado y/o ejecutado algún tipo de innovación en el período 2014-2015.</p>
                                    <div class="form-group">
                                        <label>
                                            Indique si ha invertido en alguna de las siguientes actividades de innovación durante el periodo 2014-2015, anotando las respectivas fuentes de financiación utilizadas
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th>Actividad</th>
                                                    <th>Recursos Propios</th>
                                                    <th>Banca Privada</th>
                                                    <th>Banca Pública</th>
                                                    <th>Otros Recursos</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Trabajos de creación sistemáticos llevados a cabo dentro de la empresa con el fin de aumentar el volumen de conocimientos y su utilización para idear bienes, servicios, o procesos nuevos o mejorados">Actividades de I+D Internas</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p32" value="0">
                                                                    <input type="checkbox" name="p32" value="1" @if($icai->p32=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p33" value="0">
                                                                    <input type="checkbox" name="p33" value="1" @if($icai->p33=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p34" value="0">
                                                                    <input type="checkbox" name="p34" value="1" @if($icai->p34=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p35" value="0">
                                                                    <input type="checkbox" name="p35" value="1" @if($icai->p35=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Adquisición o financiación de las mismas actividades que las arriba indicadas (I+D) pero realizadas por otras organizaciones públicas o privadas (incluye organismos de investigación)">Adquisición de I+D (externa)</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p36" value="0">
                                                                    <input type="checkbox" name="p36" value="1" @if($icai->p36=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p37" value="0">
                                                                    <input type="checkbox" name="p37" value="1" @if($icai->p37=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p38" value="0">
                                                                    <input type="checkbox" name="p38" value="1" @if($icai->p38=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p39" value="0">
                                                                    <input type="checkbox" name="p39" value="1" @if($icai->p39=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Maquinaria y equipo, específicamente comprado para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados (No incluir aquellos registrados en I+D, item 1)">Adquisición de maquinaria y equipo</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p40" value="0">
                                                                    <input type="checkbox" name="p40" value="1" @if($icai->p40=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p41" value="0">
                                                                    <input type="checkbox" name="p41" value="1" @if($icai->p41=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p42" value="0">
                                                                    <input type="checkbox" name="p42" value="1" @if($icai->p42=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p43" value="0">
                                                                    <input type="checkbox" name="p43" value="1" @if($icai->p43=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Adquisición, generación, outsourcing o arriendo de elementos de hardware, software y/o servicios para el manejo o procesamiento de la información, específicamente destinados a la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados">Tecnologías de información y telecomunicaciones</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p44" value="0">
                                                                    <input type="checkbox" name="p44" value="1" @if($icai->p44=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p45" value="0">
                                                                    <input type="checkbox" name="p45" value="1" @if($icai->p45=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p46" value="0">
                                                                    <input type="checkbox" name="p46" value="1" @if($icai->p46=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p47" value="0">
                                                                    <input type="checkbox" name="p47" value="1" @if($icai->p47=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Actividades de introducción en el mercado de bienes o servicios nuevos o significativamente mejorados, incluye investigación de mercado y publicidad de lanzamiento">Mercadeo de innovaciones</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p48" value="0">
                                                                    <input type="checkbox" name="p48" value="1" @if($icai->p48=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p49" value="0">
                                                                    <input type="checkbox" name="p49" value="1" @if($icai->p49=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p50" value="0">
                                                                    <input type="checkbox" name="p50" value="1" @if($icai->p50=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p51" value="0">
                                                                    <input type="checkbox" name="p51" value="1" @if($icai->p51=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Adquisición o uso bajo licencia, de patentes u otros registros de propiedad intelectual, de inventos no patentados y conocimientos técnicos o de otro tipo; de otras empresas u organizaciones para utilizar en las innovaciones de su empresa">Transferencia de tecnología</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p52" value="0">
                                                                    <input type="checkbox" name="p52" value="1" @if($icai->p52=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p53" value="0">
                                                                    <input type="checkbox" name="p53" value="1" @if($icai->p53=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p54" value="0">
                                                                    <input type="checkbox" name="p54" value="1" @if($icai->p54=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p55" value="0">
                                                                    <input type="checkbox" name="p55" value="1" @if($icai->p55=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Asesorías para la utilización de conocimientos tecnológicos aplicados, por medio del ejercicio de un arte o técnica, específicamente contratadas para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados. Incluye inteligencia de mercados y vigilancia tecnológica">Asistencia técnica y consultoría</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p56" value="0">
                                                                    <input type="checkbox" name="p56" value="1" @if($icai->p56=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p57" value="0">
                                                                    <input type="checkbox" name="p57" value="1" @if($icai->p57=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p58" value="0">
                                                                    <input type="checkbox" name="p58" value="1" @if($icai->p58=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p59" value="0">
                                                                    <input type="checkbox" name="p59" value="1" @if($icai->p59=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Cambios en los métodos o patrones de producción y control de calidad, y elaboración de planos y diseños orientados a definir procedimientos técnicos, necesarios para la producción o implementación de bienes, servicios o procesos nuevos o significativamente mejorados en la empresa">Ingeniería y diseño industrial</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p60" value="0">
                                                                    <input type="checkbox" name="p60" active="1" @if($icai->p60=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p61" value="0">
                                                                    <input type="checkbox" name="p61" value="1" @if($icai->p61=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p62" value="0">
                                                                    <input type="checkbox" name="p62" value="1" @if($icai->p62=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p63" value="0">
                                                                    <input type="checkbox" name="p63" value="1" @if($icai->p63=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div data-toggle="tooltip" title="Formación a nivel de maestría y doctorado, y capacitación que involucra un grado de complejidad significativo (requiere de un personal capacitador altamente especializado). Se incluye la realizada mediante financiación con recursos de la empresa y la impartida directamente dentro de la empresa.">Formación y capacitación especializada</div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p64" value="0">
                                                                    <input type="checkbox" name="p64" value="1" @if($icai->p64=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p65" value="0">
                                                                    <input type="checkbox" name="p65" value="1" @if($icai->p65=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p66" value="0">
                                                                    <input type="checkbox" name="p66" value="1" @if($icai->p66=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="hidden" name="p67" value="0">
                                                                    <input type="checkbox" name="p67" active="1" @if($icai->p67=="1") checked @endif></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Seccion 9-->
                                <div class="tab-pane fade" id="section9">
                                    <p><strong>Nota: </strong>Diligenciar esta sesión si la empresa ha iniciado o ejecutado algún tipo de innovación en el período 2014-2015. </p>
                                    <p><strong>Indique el grado de importancia de los objetivos perseguidos al momento de realizar sus innovaciones en el período 2014 - 2015 </strong>(Nota: Si el objetivo no fue perseguido al momento de realizar sus innovaciones, no conteste las siguientes preguntas)</p>
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
                                                @for($i = 69; $i<=68+count($activities); $i++)
                                                <tr>
                                                    <td>
                                                        {{ $activities[$i-69] }}
                                                    </td>
                                                    <td>
                                                        <div class="form-group" style="padding:10px">
                                                            <input type="hidden" name="{{ 'p' . $i }}" value="{{ $icai['p' . $i] }}" data-range>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Seccion 10-->
                                <div class="tab-pane fade" id="section10">
                                    <p><strong>Nota: </strong>Diligenciar esta sesión si la empresa ha iniciado o ejecutado algún tipo de innovación en el período 2014-2015. </p>
                                    <p><strong>Señale el grado de importancia que tuvieron las siguientes barreras para la actividad innovadora en su empresa. </strong>(Nota: Si la barrera no fue percibida al momento de realizar sus innovaciones, no conteste las siguientes preguntas)</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>
                                                    Barreras
                                                </th>
                                                <th>
                                                    Grado de importancia
                                                </th>
                                            </thead>
                                            <tbody>
                                                @for($i = 81; $i<=80+count($barriers); $i++)
                                                <tr>
                                                    <td>
                                                        {{ $barriers[$i-81] }}
                                                    </td>
                                                    <td>
                                                        <div class="form-group" style="padding:10px">
                                                            <input type="hidden" name="{{ 'p' . $i }}" value="{{ $icai['p' . $i] }}" data-range>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Seccion 11-->
                                <div class="tab-pane fade" id="section11">
                                    <p><strong>Nota: </strong>Diligenciar esta sesión si la empresa ha iniciado o ejecutado algún tipo de innovación en el período 2014-2015.</p>
                                    <p><strong>Señale el grado de importancia que tuvieron las siguientes fuentes de información para la actividad innovadora en su empresa. </strong>(Nota: Si la fuente de información no fue utilizada al momento de realizar sus innovaciones, no conteste las siguientes preguntas)    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>
                                                    Fuentes de información
                                                </th>
                                                <th>
                                                    Grado de importancia
                                                </th>
                                            </thead>
                                            <tbody>
                                                @for($i = 93; $i<=92+count($sources); $i++)
                                                <tr>
                                                    <td>
                                                        {{ $sources[$i-93] }}
                                                    </td>
                                                    <td>
                                                        <div class="form-group" style="padding:10px">
                                                            <input type="hidden" name="{{ 'p' . $i }}" value="{{ $icai['p' . $i] }}" data-range>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <p><strong>Señale el grado de importancia de los siguientes socios de cooperación  utilizados para llevar a cabo actividades de ciencia, tecnología e innovación durante el periodo 2014 - 2015 </strong>(Nota: Si no hubo cooperación con el socio al momento de realizar sus innovaciones, no conteste las siguientes preguntas)
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>
                                                    Socio de cooperación
                                                </th>
                                                <th>
                                                    Grado de importancia
                                                </th>
                                            </thead>
                                            <tbody>
                                                @for($i = 105; $i<=104+count($partners); $i++)
                                                <tr>
                                                    <td>
                                                        {{ $partners[$i-105] }}
                                                    </td>
                                                    <td>
                                                        <div class="form-group" style="padding:10px">
                                                            <input type="hidden" name="{{ 'p' . $i }}" value="{{ $icai['p' . $i] }}" data-range>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary pull-right">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
<script src="{{ URL::asset('assets/js/datetimepicker/datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jqueryrange/jquery.range.min.js') }}"></script>
<script type="text/javascript">
    $('#myTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
    $(function(){
        var tags = [
            <?php  
            $ciius= file_get_contents(storage_path('CIIU.txt'));
            $ciius = explode(";", $ciius);
            foreach($ciius as $ciiu){
                echo "'" . $ciiu . "'"  . ", ";
            }
            ?>
        ];
        $("#ciuu").autocomplete({
            source: tags
        });
    });
    $('#datepicker').datetimepicker({
    viewMode: 'years',
    'format' : 'YYYY'
    });
    var selector = '[data-range]';
    var $element = $(selector);
    $($element).jRange({
        from: 0,
        to: 100,
        scale: [0,10,20,30,40,50,60,70,80,90,100],
        showLabels: false,
    });
</script>
@endsection