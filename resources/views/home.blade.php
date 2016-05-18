@extends('layouts.app')

@section('content')
<div>
    @if (Auth::user()->isAdmin())
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $users }}</div>
                            <div>Empresarios Registrados</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/users') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Usuarios</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $companies }}</div>
                            <div>Empresas Registradas</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/companies') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Empresas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $projects }}</div>
                            <div>Proyectos Registrados</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/projects') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver Proyectos</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                    <p>Bienvenido a la plataforma de gestión de proyectos del Fondo del Fomento a la Innovación Caribe (FFI Caribe).</p>
                    <p>Comienza por registrar tu empresa en la pestaña “Empresas”, luego llena la siguiente información:</p>
                    <ul>
                        {{--<li><p onclick="swal('¿Modelo de Negocios Canvas?', 'Es una herramienta de análisis donde quedan reflejadas las fortalezas y debilidades de un modelo de negocio, proveyendo una visión global de este de manera rápida y sencilla.')">Modelo de Negocios Canvas <i class=" glyphicon glyphicon-question-sign"></i></p></li>--}}
                        <li><p onclick="swal('¿ICAi?', 'El Instrumento de Caracterización de la Actividad Innovadora (ICAI) permite identificar los insumos, productos, resultados y comportamientos derivados de la actividad innovadora de las empresas evaluadas.')">Instrumento ICAi <i class=" glyphicon glyphicon-question-sign"></i></p></li>
                        <li><p onclick="swal('¿Miindex?', 'Es un instrumento diseñado para medir la percepción interna de la cultura de innovación.')">Instrumento Miindex <i class=" glyphicon glyphicon-question-sign"></i></p></li>
                    </ul>
                    <p>Si tienes cualquier duda comunícate con uno de nuestros asesores escribiéndonos al correo <a href="mailto:fficaribe@uninorte.edu.co">fficaribe@uninorte.edu.co</a> o a cualquiera de nuestros asesores:</p>
                    <ul>
                        <li>Nicolás E. Gómez Jacome - <a href="mailto:njacome@uninorte.edu.co">njacome@uninorte.edu.co</a></li>
                        <li>Tatiana C. Alfaro Díaz - <a href="mailto:alfarot@uninorte.edu.co">alfarot@uninorte.edu.co</a></li>
                        <li>Valeria Chain Pugliese - <a href="mailto:vchain@uninorte.edu.co">vchain@uninorte.edu.co</a></li>
                        <li>Emyle Britton Acevedo - <a href="mailto:ebritton@uninorte.edu.co">ebritton@uninorte.edu.co</a></li>
                        <li>Ana Marcela Velaidez - <a href="mailto:avelaidez@uninorte.edu.co">avelaidez@uninorte.edu.co</a></li>
                    </ul>
                    <p>En esta pagina encontraras siempre las ultimas noticias, instrucciones y progreso personalizado de tu estado en la convocatoria. Asegúrate de revisar frecuentemente.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <img src="{{ URL::asset('assets/img/sena.png') }}" style="width:100%">
        </div>
        <div class="col-xs-4">
            <img src="{{ URL::asset('assets/img/sennova.png') }}" style="width:100%">
        </div>
        <div class="col-xs-4">
            <img src="{{ URL::asset('assets/img/uninorte-cesi.png') }}" style="width:100%">
        </div>
    </div>
</div>
@endsection
