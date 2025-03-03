<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Registrarse - Odontologia</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
</head>
<style type="text/css">

    html{
    background: url('images/registro.png') no-repeat center center;
    background-attachment: fixed;
    background-size: cover;
}
</style>
<body>

    <form class="login" method="post" name="login" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <img src="{{ asset('images/op01.png') }}" width="70">
        <h2>Registrarse...</h2>
        
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Usuario" class="bordes{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus/>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <small style="color: #DC3545;font-size: 11pt;font-style: italic;">
                    {{ $errors->first('email') }}</small>
            </span>
        @endif

        <input id="password" type="password" name="password" placeholder="Contraseña" autocomplete="off" class="bordes{{ $errors->has('password') ? ' is-invalid' : '' }}" > 
        <img src="{{ asset('images/img1.png') }}" style="width: 30px;margin-left: -40px;cursor: pointer;" id="nover">
        <img src="{{ asset('images/img2.png') }}" style="width: 30px;margin-left: -40px;cursor: pointer;display: none;" id="siver">

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <small style="color: #DC3545;font-size: 11pt;font-style: italic;">
                    {{ $errors->first('password') }}</small>
            </span>
        @endif

        <input type="submit" value="Ingresar"></input> <br>
        <a href="" style="width: 100%;border-width: 1px;border-color: #0987B6;border-style: dashed;padding: 5px;border-radius: 5px;font-size: 13pt;margin: 5px;color: #23BDF7;">
            Registrarse
        </a>
        <br><br>

      </form>


<script type="text/javascript">
  $('#nover').click(function() {
    $('#nover').hide();
    $('#siver').show();
    $('#password').prop('type','text');
  });
  $('#siver').click(function() {
    $('#siver').hide();
    $('#nover').show();
    $('#password').prop('type','password');
  });

</script>

</body>
</html>