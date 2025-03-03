@extends('layouts.app')
@section('title','Editar Usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

<p style="text-align: center;margin-bottom: 3px;color: #077DC7;">
  <i class="fa fa-bars"></i>  EDITAR TRATAMIENTOS
</p>


{!! Form::open(['route'=>['tratamientos.update',$viewTrata->id],'method'=>'PUT']) !!}

        
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tratamientos</small>
            <input type="text" name="Tratamientos" class="form-control" style="text-transform: uppercase"  required="" placeholder="Tratamientos" value="{{ $viewTrata->Tratamientos }}">   
            </div>         
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Precio</small>
            <input type="number" name="Precio" class="form-control"  value="{{ $viewTrata->Precio }}" required="" placeholder="Precio">   
            </div>         
        </div>


        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
            <a href="{{ route('tratamientos.index') }}" class="btn btn-dark"><i class="fa fa-remove"></i> Cancelar</a>
          </div>
        </div>  
    </div>
</div>

            {!! Form::close() !!}
      </div>
    </div>
  </div>

</div>
</div>


            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {


});
</script>
    
</div>

@endsection
