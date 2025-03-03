
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =====================================================================================================-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- =====================================================================================================-->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <!-- =====================================================================================================-->
    <title>Odontología -  @yield('title','')</title>

    <!-- =====================================================================================================-->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- =====================================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- =====================================================================================================-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet"> 

    <!-- ==================================================================================================== -->
    <link rel="stylesheet" href="{{ asset('lineal/morris.js/morris.css') }}">
    <!-- ==================================================================================================== -->
<!-- GRAFICO LIENAL --> 
<script src="{{ asset('lineal/raphael/raphael.min.js') }}"></script>
    <!-- =====================================================================================================-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locale-all.js') }}"></script>
    <!-- =====================================================================================================-->

<!-- GRAFICO LIENAL -->
<script src="{{ asset('lineal/morris.js/morris.min.js') }}"></script>

<!-- GRAFICO DE BARRAS -->
<script src="{{ asset('Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('Flot/jquery.flot.categories.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>

<style type="text/css">
    .img_diente:hover{
        width: 35px;
        background-color: #E2F7F7;
    }
</style>

    <script type="text/javascript">
        
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
        
    </script>
</head>
<body style="overflow-x: hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="position: fixed;width: 100%;z-index: 9;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #0E63A4;" >
                   <!-- {{ config('app.name', 'Laravel') }}-->
                   <!-- <img src="{{ asset('images/favicon.png') }}" width="30"> -->
                    <img src="{{ asset('images/logotc.png') }}" width="35">
                   ODONTOLOGÍA <b>TC</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                        @guest
      
                        @else
                        <?php $foto=Auth::user()->Foto; ?>
                        <ul class="navbar-nav ml-auto">

                          <li class="nav-item" >
                                <a class="nav-link" href="{{ route('home') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-home"></i> Inicio</a>
                            </li>
                    @if(Auth::user()->Rol=='Administrador')

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #097FB6;font-size: 11pt;font-weight: bold;">
                               <i class="fa fa-cogs"></i> Mantenimiento
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-users"></i> Usuarios
                                </a>
                                <a class="dropdown-item" href="{{ route('especialidades.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-briefcase"></i> Especialidades
                                </a>
                                <a class="dropdown-item" href="{{ route('medicos.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-user-md"></i> Medicos
                                </a>

                                <a class="dropdown-item" href="{{ route('tratamientos.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-bars"></i> Tratamientos
                                </a>

                            </div>
                        </li>


                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('citas.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-calendar-plus-o"></i> Citas</a>
                        </li>

                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('hcitas.index') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-calendar-check-o"></i> Historial Citas</a>
                        </li>
                 
                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('ver.calendario') }}" style="color: #097FB6;font-size: 11pt;font-weight: bold;"> <i class="fa fa-calendar"></i> Calendario</a>
                        </li>


                    @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #009E60;">
                                   <img src="{{ asset('images/Users/'.$foto) }}" width="20">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('configs.index') }}">
                                        <i class="fa fa-cogs"></i> Configuración
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-in"></i> Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <br><br>
            @yield('content')
        </main>
    </div>
</body>

</html>
