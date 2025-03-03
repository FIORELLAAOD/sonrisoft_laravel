@extends('layouts.app')
@section('title','Calendario de Citas')
@section('content')

<div class="row"> 
<div class="modal fade" id="mimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" ><i class="fa fa-user"></i> <span id="titulo"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="descripcion">
            
        </p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Aceptar</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div> 
</div>

    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header card-primary">  <h5 style="color: #0DABBE;">
                    <a href="{{ route('home') }}" style="margin-right: 5px;">
                        <i class="fa fa-reply-all"></i> Volver...
                    </a> 
                    <i class="fa fa-calendar"></i> CALENDARIO DE CITAS</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="calendar">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
var eventos=[];

@foreach($vLista as $cita)
    eventos.push({
        title:"<?php echo $cita['paciente']; ?>",
        description:"<?php echo "<b>Médico: </b>".$cita['medico']; ?>" + '<br>' + "<?php echo "<b>Tratamiento: </b>".$cita['tratamiento']; ?>" + '<br>' + "<?php echo "<b>Enfermedad: </b>".$cita['enfermedad']; ?>",
        start:"<?php echo $cita['fecha']; ?>",
        //end:'2019-12-12 12:30:00',
        color: "<?php echo $cita['color']; ?>",
        textColor:'#ffffff',
    });
@endforeach



    $('#calendar').fullCalendar({
        locale:'es',
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonIcons: true,
        weekNumbers: false,
        editable: true,
        eventLimit: true,
        events: eventos,
        dayClick: function (date, jsEvent, view) {
            //alert('Has hecho click en: '+ date.format());
        }, 
        eventClick: function (calEvent, jsEvent, view) {
            $('#titulo').text(calEvent.title);
            $('#descripcion').html(calEvent.description);
            $('#mimodal').modal('show');
        },  
    });
});
</script>



@endsection
