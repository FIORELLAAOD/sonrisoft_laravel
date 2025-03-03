@extends('layouts.app')
@section('title','Inicio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header"> Hola <b> {{ Auth::user()->name }}</b>, bienvenido(a) al sistema.</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->Rol=='Administrador')

                        <br>

                        <div class="row"> <!-- inicio de la fila -->
                            
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('users.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/searchuser.png" alt="Card image cap" width="58%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Usuarios</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('pacientes.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/op01.png" alt="Card image cap" width="58%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Pacientes</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('especialidades.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/ok.png" alt="Card image cap" width="58%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">   Especialidades </small>

                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('medicos.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/medico.jpg" alt="Card image cap" width="52%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Medicos</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('tratamientos.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/tratamiento.jpg" alt="Card image cap" width="59%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Tratamientos</small>

                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('citas.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/cita.png" alt="Card image cap" width="56%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Citas</small>

                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('odontograma') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/odontograma.png" alt="Card image cap" width="54%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Odontograma</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                          
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('hcitas.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/hcitas.jpg" alt="Card image cap" width="54%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Historial Citas</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                          
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('ver.calendario') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/calendario.png" alt="Card image cap" width="100%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Calendario</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('pagos.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/pagos.png" alt="Card image cap" width="58%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Pagos</small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('reportes.index') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/reporte.png" alt="Card image cap" width="50%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Reportes </small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('rpt.rptcitas') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/estadistica.png" alt="Card image cap" width="65%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Resumen </small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="{{ route('rpt.tendencia') }}" style="text-decoration: none;">
                                    <div class="card">
                                      <div class="card-body">
                                        <center>
                                            <img  src="images/lineal.png" alt="Card image cap" width="48%"><br>
                                            <small style="font-size: 12pt;color: rgb(14, 99, 164);">Tendencia </small>
                                        </center>
                                      </div>
                                    </div>
                                </a>                            
                            </div>


                        </div>  <!-- fin de la fila -->

                    @endif


@if(Auth::user()->Rol=='Medico')
    <br>
    <div class="row"> <!-- inicio de la fila -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('citasm.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/cita.png" alt="Card image cap" width="56%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Citas</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('hcitasm.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/hcitas.jpg" alt="Card image cap" width="54%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Historial Citas</small>
                    </center>
                  </div>
                </div>
            </a>                          
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('ver.calendariom') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/calendario.png" alt="Card image cap" width="100%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Calendario</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('pagosm.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/pagos.png" alt="Card image cap" width="58%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Pagos</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>
    </div>

@endif



@if(Auth::user()->Rol=='Paciente')
    <br>
    <div class="row"> <!-- inicio de la fila -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('citasp.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/cita.png" alt="Card image cap" width="56%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Citas</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('hcitasp.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/hcitas.jpg" alt="Card image cap" width="54%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Historial Citas</small>
                    </center>
                  </div>
                </div>
            </a>                          
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('ver.calendariop') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/calendario.png" alt="Card image cap" width="100%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Calendario</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="{{ route('pagosp.index') }}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <img  src="images/pagos.png" alt="Card image cap" width="58%"><br>
                        <small style="font-size: 12pt;color: rgb(14, 99, 164);">Pagos</small>
                    </center>
                  </div>
                </div>
            </a>                            
        </div>
    </div>

@endif


<br>
<br>
<br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection