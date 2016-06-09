<!DOCTYPE html>
<html>
<head>
    <title>FFI Caribe - Pagina no encontrada</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <style>
        .error {
          margin: 0 auto;
          text-align: center;
      }

      .error-code {
          bottom: 60%;
          color: #2d353c;
          font-size: 96px;
          line-height: 100px;
      }

      .error-desc {
          font-size: 12px;
          color: #647788;
      }

      .m-b-10 {
          margin-bottom: 10px!important;
      }

      .m-b-20 {
          margin-bottom: 20px!important;
      }

      .m-t-20 {
          margin-top: 20px!important;
      }
  </style>
</head>
<body>
    <div class="container">
        <div class="error">
            <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
            <h3 class="font-bold">No pudimos encontrar la pagina.</h3>

            <div class="error-desc">
                Lo sentimos, pero la pagina que estas buscando no ha sido encontrada o no existe. <br>
                Intenta actualizando la pagina o clickeando el boton de abajo para devolverte a la pagina de inicio.
                <div style="padding:20px">
                    <a class="btn btn-default" href="{{ url('/') }}">
                        <i class="fa fa-arrow-left"></i>
                        Volver al inicio                      
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
