@extends('layouts.app')
@section('title','Resumen General')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">  <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a> <i class="fa fa-bar-chart"></i> Resumen General de citas</div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="bar-chart" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(function () {

var data = [], totalPoints = 100
//BAR CHART 
    var bar_data = { 
      data : [
      ['Enero <br> <b>' + "{{ $cEnero }}" + '</b>', "{{ $cEnero }}"], 
      ['Febrero <br> <b>'+ "{{ $cFebrero }}" + '</b>', "{{ $cFebrero }}"], 
      ['Marzo <br> <b>'+ "{{ $cMarzo }}" + '</b>', "{{ $cMarzo }}"], 
      ['Abril <br> <b>'+ "{{ $cAbril }}" + '</b>', "{{ $cAbril }}"], 
      ['Mayo <br> <b>'+ "{{ $cMayo }}" + '</b>', "{{ $cMayo }}"], 
      ['Junio <br> <b>'+ "{{ $cJunio }}" + '</b>', "{{ $cJunio }}"],
      ['Julio <br> <b>'+ "{{ $cJulio }}" + '</b>', "{{ $cJulio }}"],
      ['Agosto <br> <b>'+ "{{ $cAgosto }}" + '</b>', "{{ $cAgosto }}"], 
      ['Setiembre <br> <b>'+ "{{ $cSetiembre }}" + '</b>', "{{ $cSetiembre }}"], 
      ['Octubre <br> <b>'+ "{{ $cOctubre }}" + '</b>', "{{ $cOctubre }}"], 
      ['Noviembre <br> <b>' + "{{ $cNoviembre }}" + '</b>', "{{ $cNoviembre }}"], 
      ['Diciembre <br> <b>' + "{{ $cDiciembre }}" + '</b>', "{{ $cDiciembre }}"],
      ],
      color: '#04ACA2'
    }
console.log(bar_data);

    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#08A2A4',
        tickColor  : '#C4F0ED'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    });
    /* END BAR CHART */





  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
@endsection