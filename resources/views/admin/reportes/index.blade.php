@inject('medicos','App\Medico')
@inject('pacientes','App\Models\User')
@inject('especialidades','App\Especialidad')
@inject('tratamientos','App\Tratamiento')
@extends('layouts.app')
@section('title','Reportes')
@section('content')
<div class="container">
    

    <div class="row justify-content-center">
        <div  class="col-lg-16 col-md-16 col-sm-16 col-xs-16">
            <div class="card">
                <div class="card-header">
                    Opciones de Reporte
                </div>
                <div class="card-body">  

                        <div class="row"> <!-- inicio de la fila -->
                            
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <a href="{{ route('home') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/inicio.png" alt="Card image cap" width="60%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Inicio</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <a href="{{ route('rpt.pacientes') }}" style="text-decoration: none;" target="_blank">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/searchuser.png" alt="Card image cap" width="60%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">
                                                <i class="fa fa-print"></i> Pacientes
                                            </small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <a href="{{ route('rpt.medicos') }}" style="text-decoration: none;" target="_blank">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/medico.jpg" alt="Card image cap" width="54%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);"> <i class="fa fa-print"></i> Medicos</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>


                        </div>  <!-- fin de la fila -->

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {

});
</script>




@endsection
