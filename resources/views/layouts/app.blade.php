<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FFI Caribe</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/metisMenu/metisMenu.min.css') }}">

    <!-- Timeline CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/timeline.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sb-admin-2.css') }}">

    <!-- Morris Charts CSS -->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/morrisjs/morris.min.css') }}">

   <link rel="stylesheet" href="{{ URL::asset('assets/css/jqueryrange/jquery.range.css') }}">

   <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert2/sweetalert2.css') }}">

   <link rel="stylesheet" href="{{ URL::asset('assets/css/datetimepicker/datetimepicker.css') }}">

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('assets/img/FFI-Logo.png') }}" class="header-logo"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('users/view') . '/' . Auth::user()->id }}"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        @if(Auth::user()->isAdmin())
                        <li>
                            <a href="{{ url('/users') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ url('/companies') }}"><i class="fa fa-building fa-fw"></i> Empresas</a>
                        </li>
                        {{--<li>
                            <a href="{{ url('/projects') }}"><i class="fa fa-book fa-fw"></i> Proyectos</a>
                        </li>--}}
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                @if(Session::has('status'))
                <div class="alert alert-success" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ Session::get('status') }}</p>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>


    <script src="{{ URL::asset('assets/js/datetimepicker/datetimepicker.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('assets/js/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/morrisjs/morris.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('assets/js/sb-admin-2.js') }}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-75714542-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>

</html>
