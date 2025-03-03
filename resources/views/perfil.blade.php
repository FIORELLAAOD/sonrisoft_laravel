@extends('layouts.app')
@inject('viewQeujas','App\Queja')
@section('title','Inicio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header"> <i class="fa fa-user"></i> {{ Auth::user()->name }}</div>
                <div class="card-body">

{!! Form::open(['route'=>['users.update',Auth::user()->id],'method'=>'PUT']) !!}

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
         <?php $foto=Auth::user()->Foto; ?>
         <img src="{{ asset('images/Users/'.$foto) }}" width="150" class="img-thumbnail">
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required="">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo documento</small>
                {!! Form::select('TipoDoc',['DNI'=>'DNI'],
        Auth::user()->TipoDoc,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required'])
        !!} 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">N° documento</small>
                <input type="text" name="NumDoc" maxlength="8" class="form-control" value="{{ Auth::user()->NumDoc }}" required="" placeholder="N° de documento">   
            </div>                
        </div>

        <div class="row" style="margin-top: 5px;">
            @if(Auth::user()->Rol=='Usuario')
           
            @endif
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="10" class="form-control" value="{{ Auth::user()->Telefono }}" required="" placeholder="Telefono" minlength="6">  
            </div>                
        </div>

        <br>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly="">
            <input type="text" name="Rol" class="form-control" value="{{ Auth::user()->Rol }}" readonly="">
        </div>
        </div>
        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Actualizar</button>
          <a href="{{ route('home') }}" class="btn btn-dark"><i class="fa fa-remove"></i> Cancelar</a>
      </div>
        </div>  
    </div>
</div>

</form>


<br>
<br>
<br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
