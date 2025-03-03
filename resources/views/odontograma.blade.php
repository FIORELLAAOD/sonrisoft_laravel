@inject('funciones','App\Http\Controllers\FuncionesController')
@inject('odonto','App\Odontograma')
@inject('tratamientos','App\Tratamiento')
@inject('acciones','App\Models\Configuracion')
@inject('histo','App\Models\Historial')
@extends('layouts.app')
@section('title','Odontograma')
@section('content')
<?php $fecha=date('Y-m-d'); ?>
<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="mdl_registro">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="color: #17a2b8;">
                <img src="{{ asset('images/diente.png') }}"  width="25">
                <span id="lbl_diente_modal"></span>
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('guardar.odontograma'),'method'=>'POST']) !!}

            <input type="hidden" name="id_paciente" id="id_paciente">
            <input type="hidden" name="num_diente" id="num_diente">
            <input type="hidden" name="lado" id="lado">
            <input type="hidden" name="accion" id="accion">
            <input type="hidden" name="simbolo" id="simbolo">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <small style="font-size: 11pt;">Tratamiento:</small>
                            <select  name="id_tratamiento" class="form-control" id="tratamiento" required> 
                                <option value="">Seleccione...</option>
                                @foreach($tratamientos::orderBy('Tratamientos','ASC')->get() as $tratamiento)
                                    <option value="{{ $tratamiento->id }}">s/.{{ $tratamiento->Precio }} - {{ $tratamiento->Tratamientos }} </option>
                                @endforeach
                            </select>  
                        </div>         
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <small style="font-size: 11pt;">Observación (Opcional):</small>
                            <textarea class="form-control" name="descripcion" placeholder="Observación"></textarea>  
                        </div>         
                    </div>

                    <div class="row" style="margin-top: 5px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @foreach($acciones::orderBy('nombre','ASC')->get() as $btn)
                            <button type="button" class="btn btn-sm" onclick="add_accion({{ $btn->id }})" style="background-color: {{ $btn->color }};color: #fff;">{{ $btn->nombre }}</button>

                            @endforeach
                        </div>         
                    </div>

                    <div class="row" style="margin-top: 5px;border-top: solid 1px #F6ECEC;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 5px;display: none;" id="div_simbolos">
                            <button type="button" class="btn btn-danger btn-sm" onclick="ad_simbolo(1)">X</button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="ad_simbolo(2)">X</button>

                            <button type="button" class="btn btn-danger btn-sm" onclick="ad_simbolo(3)">&#9650;</button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="ad_simbolo(4)">&#9650;</button> 

                            <button type="button" class="btn btn-danger btn-sm" onclick="ad_simbolo(5)">O</button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="ad_simbolo(6)">O</button>

                            <button type="button" class="btn btn-primary btn-sm" onclick="ad_simbolo(7)">I</button>

                            <button type="button" class="btn btn-danger btn-sm" onclick="ad_simbolo(8)">S</button>
                            <button type="button" class="btn btn-primary btn-sm" onclick="ad_simbolo(9)">S</button>
                            <button type="button" class="btn btn-default btn-sm" onclick="ad_simbolo(10)">S</button>
                        </div>         
                    </div>


                    <hr>
                    <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
                      <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
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




<form action="{{ route('odontograma') }}">
    <div style="display: flex;justify-content: center;margin-bottom: 5px;background-color: #DAEFF1;padding: 5px;align-items: center;">
        <div style="margin-right: 5px;">
            <input type="text" name="paciente" class="form-control" placeholder="Buscar por DNI" required="" maxlength="8" value="{{ $paciente }}">
        </div>
        <div>
            <button class="btn btn-info" style="border-radius: 10px;"> <i class="fa fa-search" ></i> </button>
        </div>
    </div>
</form>


    @if($id_existe=='no' && $paciente!='')
    <h4 style="color: #17a2b8;text-align: center;">
        <i class="fa fa-remove"></i> No se encontrarion resultados
    </h4>
    @else
    @if($id_existe=='si')
        <div style="display: flex;justify-content: center;">
            <h4 style="color: #17a2b8;text-align: center;">
                <i class="fa fa-user"></i> {{ $dt_paciente->NumDoc }} - {{ $dt_paciente->name }}
            </h4>
            <button type="button"  style="margin-left: 20px;" class="btn btn-link" onclick="imprimir();">
                <i class="fa fa-file-pdf-o"></i> Imprimir
            </button>
        </div>
    @endif
    @endif

<div id="my_div">
    
    @if($id_existe=='si')
    <div class="row">
        <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
        <div  class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="background-color: #fff;border-radius: 10px;margin-bottom: 5px;border: solid 1px #CFE9ED;padding-top: 5px;">
            <?php $dt_h=$histo::where('id_paciente',$dt_paciente->id)->first(); ?>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;">
                        <p style="margin-bottom: 2px;"><b>Documento: </b>  <span>{{ $dt_paciente->NumDoc }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Nombres: </b>  <span>{{ $dt_paciente->name }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Correo: </b>  <span>{{ $dt_paciente->email }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Telefono: </b>  <span>{{ $dt_paciente->Telefono }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Motivo de la consulta: </b>  <span>{{ $dt_h->motivo_consul }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Diagnóstico: </b>  <span>{{ $dt_h->diagnostico }}</span></p>
                        <p style="margin-bottom: 2px;"><b>Observaciones: </b>  <span>{{ $dt_h->observacion }}</span></p>
                        

                    </td>
                    <td style="width: 50%;"> 
                        
<p style="margin-bottom: 2px;"><b>Referido por: </b>  <span>{{ $dt_h->referido }}</span></p>
                        
                        <p style="margin-bottom: 2px;">Bajo tratamiento médico: <b>  <span>{{ $dt_h->trata_medic==1 ? 'SI' : 'NO' }}</span></b></p>
                        <p style="margin-bottom: 2px;">Propenso a la Hemorragia: <b>  <span>{{ $dt_h->propen_hemo==1 ? 'SI' : 'NO' }}</span></b></p>
                        <p style="margin-bottom: 2px;">Alérgico a algún medicamento: <b>  <span>{{ $dt_h->alergico==1 ? 'SI' : 'NO' }}</span></b></p>
                        <p style="margin-bottom: 2px;">Hipertenso: <b>  <span>{{ $dt_h->hipertenso==1 ? 'SI' : 'NO' }}</span></b></p>
                        <p style="margin-bottom: 2px;">Diabético: <b>  <span>{{ $dt_h->diabetico==1 ? 'SI' : 'NO' }}</span></b></p>
                        <p style="margin-bottom: 2px;">Embarazada: <b>  <span>{{ $dt_h->embarazada==1 ? 'SI' : 'NO' }}</span></b></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endif


    <div class="row">
        <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;padding: 10px;justify-content: center;">
                @for($i=18;$i>10;$i--)
                    <div style="flex-grow: 1;margin-left: 10px;">{{ $i }}</div>
                @endfor
            </div>
            <!-- dientes 18 - 11 -->
            <div style="display: flex;justify-content: center;border-top: 1px solid #BAB9B9;padding-top: 3px;">
                @for($i=18;$i>10;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">


                       <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">


                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;padding: 10px;justify-content: center;">
                @for($i=21;$i<29;$i++)
                    <div style="flex-grow: 1;margin-left: 5px;">{{ $i }}</div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=21;$i<29;$i++)
                    <div style="flex-grow: 1;margin-left: 5px;">

                       <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>
                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>

    <div class="row">
        <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=58;$i>50;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=55){{ $i }}@else <span style="color: transparent;">00</span> @endif
                    </div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=58;$i>50;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=55)
                    <div style="flex-grow: 1;margin-left: 5px;">

                       <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                        @else
                        <div style="width: 40px;height: 40px;border: 1px solid transparent;"></div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=61;$i<69;$i++)
                    <div style="flex-grow: 1;margin-left: 20px;">
                    @if($i<=65){{ $i }}@else <span style="color: transparent;">00</span> @endif
                    </div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=61;$i<69;$i++)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=65)
                    <div style="flex-grow: 1;margin-left: 5px;">

                     <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                        @else
                        <div style="width: 40px;height: 40px;border: 1px solid transparent;"></div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>


    <div class="row">
        <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=88;$i>80;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=85){{ $i }}@else <span style="color: transparent;">00</span> @endif
                    </div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=88;$i>80;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=85)
                    <div style="flex-grow: 1;margin-left: 5px;">

                     <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                               @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                        @else
                        <div style="width: 40px;height: 40px;border: 1px solid transparent;"></div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>

        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=71;$i<79;$i++)
                    <div style="flex-grow: 1;margin-left: 20px;">
                    @if($i<=75){{ $i }}@else <span style="color: transparent;">00</span> @endif
                    </div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=71;$i<79;$i++)
                    <div style="flex-grow: 1;margin-left: 5px;">
                        @if($i<=75)
                    <div style="flex-grow: 1;margin-left: 5px;">

                     <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                               @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                        @else
                        <div style="width: 40px;height: 40px;border: 1px solid transparent;"></div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>


    <div class="row">
        <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=48;$i>40;$i--)
                    <div style="flex-grow: 1;margin-left: 20px;">{{ $i }}</div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=48;$i>40;$i--)
                    <div style="flex-grow: 1;margin-left: 5px;">

                     <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                                @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="background-color: #fff;">
            <div style="display: flex;background-color: #fff;padding: 10px;justify-content: center;">
                @for($i=31;$i<39;$i++)
                    <div style="flex-grow: 1;margin-left: 20px;">{{ $i }}</div>
                @endfor
            </div>
            <!-- dientes -->
            <div style="display: flex;padding: 10px;justify-content: center;border-top: 1px solid #BAB9B9;">
                @for($i=31;$i<39;$i++)
                    <div style="flex-grow: 1;margin-left: 5px;">

                     <!-- simbolo -->
                       <?php $img=''; ?>
                        @if($id_existe=='si')
                        <?php $simbolo=$funciones->simbolo_diente($dt_paciente->id,$i,date('Y-m-d')); ?>
                        @if($simbolo!='')

                            <?php $img=asset("images/sb".$simbolo.'.png'); ?>
                        @endif
                        @endif

                        
                        <div style="width: 40px;height: auto;background: url('{{ $img }}');background-repeat: no-repeat;background-position: center center;background-size: cover;">

                            <div style="display: flex;justify-content: center;">
                                @include('dientes.arriba')
                            </div>

                            <div style="display: flex;justify-content: center;align-items: center;">
                               @include('dientes.iz_centro_der')
                            </div>
                            <div style="display: flex;justify-content: center;">
                                @include('dientes.abajo')
                            </div>

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

<br>

    @if($id_existe=='si')
        <div class="row">
            <div  class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-10">
                <img src="{{ asset('images/sec2.png') }}" alt="" style="max-width: 100%;">
            </div>
        </div>
    @endif

</div>

<script>

function registrar(id_pa,num_diente,parte){
    $('#id_paciente').val(id_pa);
    $('#lbl_diente_modal').text('Diente N° '+num_diente + ' - Lado: '+parte);
    $('#num_diente').val(num_diente);
    $('#lado').val(parte);
    $('#accion').val('');
    $('#simbolo').val('');
    if (parte=='Centro') {
        $('#div_simbolos').show();
    }else{
        $('#div_simbolos').hide();
    }
}

function add_accion(descri) {
   $('#accion').val(descri);
}


function ad_simbolo(simbol) {
    $('#simbolo').val(simbol);
}

function imprimir() {
        const $elementoParaConvertir = $('#my_div').html();
        html2pdf()
            .set({
                margin: 0.5,
                filename: 'odontograma.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a3',
                    orientation: 'portrait'
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err=>console.log(err));

    }

$( document ).ready(function() {



});
</script>


@endsection
