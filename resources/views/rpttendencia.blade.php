@extends('layouts.app')
@section('title','Resumen General')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">   <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>  <i class="fa fa-bar-chart"></i> Tendencia de la atención de las citas</div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="chart" id="line-chart" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    "use strict";



    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        { mes: '2019-01', value: "{{ $cEnero }}" },
        { mes: '2019-02', value: "{{ $cFebrero }}" },
        { mes: '2019-03', value: "{{ $cMarzo }}" },
        { mes: '2019-04', value: "{{ $cAbril }}" },
        { mes: '2019-05', value: "{{ $cMayo }}" },
        { mes: '2019-06', value: "{{ $cJunio }}" },
        { mes: '2019-07', value: "{{ $cJulio }}" },
        { mes: '2019-08', value: "{{ $cAgosto }}" },
        { mes: '2019-09', value: "{{ $cSetiembre }}" },
        { mes: '2019-10', value: "{{ $cOctubre }}" },
        { mes: '2019-11', value: "{{ $cNoviembre }}" },
        { mes: '2019-12', value: "{{ $cDiciembre }}" }
      ],
        xkey: 'mes',
        ykeys: ['value'],
        labels: ['Citas'],
        lineColors: ['#1FB6B4']
    });


   
  });
</script>

@endsection