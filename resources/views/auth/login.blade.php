@extends('layouts.fullscreen')

@section('content')
<div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
            <a href="http://www.fficaribe.com">
                <img src="{{ URL::asset('assets/img/Logo-FFI-alt.png') }}" class="main-logo">
            </a>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            @if(Session::has('status'))
            <div class="alert alert-success" align="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>{{ Session::get('status') }}</p>
            </div>
            @endif
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#companies" aria-controls="companies" role="tab" data-toggle="tab">Empresas</a></li>
                        <li role="presentation"><a href="#evaluators" aria-controls="evaluators" role="tab" data-toggle="tab">Evaluadores</a></li>
                    </ul>  
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="companies">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {!! csrf_field() !!}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">E-Mail</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember">  Recordarme
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-sign-in"></i>Iniciar Sesión
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </form>
                            {{-- <p class="text-center"><a href="{{ 'register' }}">Registrate</a></p> --}}
                        </div>
                        <div class="tab-pane fade" id="evaluators">
                            <div class="alert alert-info" align="center">
                                <p>Se encuentra abierta la convocatoria para ser evaluador de los proyectos presentados en el Fondo de Fomento a la Innovación y Desarrollo Tecnológico en las  Empresas del SENA. Para aplicar llene el formulario <a href="{{ url('convocatoria-evaluadores') }}">aquí</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
