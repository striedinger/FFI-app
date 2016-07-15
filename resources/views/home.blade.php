@extends('layouts.app')

@section('title')
    Inicio
@endsection

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
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>
                <div class="panel-body">
                    <p>Bienvenido a la plataforma de gestión de proyectos del Fondo de Fomento a la Innovación y Desarrollo Tecnológico en las Empresas (FFI Caribe).</p>
                    <p>En esta página encontrara siempre las últimas noticias, instrucciones y progreso personalizado de su estado en la convocatoria. Asegúrese de revisar frecuentemente.</p>
                    <hr>
                    <p><strong>Contacto</strong></p>
                    <p>Si tiene cualquier duda comuníquese con uno de nuestros asesores:</p>
                    <ul>
                        <li>Nicolás E. Gómez Jacome - <a href="mailto:njacome@uninorte.edu.co">njacome@uninorte.edu.co</a></li>
                        <li>Tatiana C. Alfaro Díaz - <a href="mailto:alfarot@uninorte.edu.co">alfarot@uninorte.edu.co</a></li>
                        <li>Valeria Chain Pugliese - <a href="mailto:vchain@uninorte.edu.co">vchain@uninorte.edu.co</a></li>
                        <li>Emyle Britton Acevedo - <a href="mailto:ebritton@uninorte.edu.co">ebritton@uninorte.edu.co</a></li>
                        <li>Ana Marcela Velaidez - <a href="mailto:avelaidez@uninorte.edu.co">avelaidez@uninorte.edu.co</a></li>
                    </ul>
                    <p>O nos puede contactar a través de nuestro correo general: <a href="mailto:fficaribe@uninorte.edu.co">fficaribe@uninorte.edu.co</a></p>
                    <hr>
                    <p><strong>Apoyan</strong></p>
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
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Noticias
                </div>
                <div class="panel-body">
                    <p><strong>05/25/2016:</strong> Se ha deshabilitado la creación y actualización de los instrumentos ICAi y Miindex debido a que se ha agotado el plazo para diligenciarlos.
                    {{--Se ha vencido el plazo para llenar los instrumentos ICAi y Miindex, ya no podrán crearse nuevos o actualizar existentes.--}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
