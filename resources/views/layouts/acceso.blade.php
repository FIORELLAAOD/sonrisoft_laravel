<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SysReport UPLA -  @yield('title','')</title>


<!--===============================================================================================-->
    <link rel="icon" href="{{ asset('images/logo.png') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resourcelogin/css/main.css') }}">




    <link rel="stylesheet" type="text/css" href="{{ asset('fullcalendar.min.css') }}">
    
<!--===============================================================================================-->
</head>
<body>

@yield('content')



    <div id="dropDownSelect1"></div>


<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('resourcelogin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('resourcelogin/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="{{ asset('resourcelogin/js/map-custom.js') }}"></script>

<!--===============================================================================================-->
    <script src="{{ asset('resourcelogin/js/main.js') }}"></script>

    





    

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>

</body>
</html>
