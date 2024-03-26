@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h1 class="">
                        <label for="">RADICACIÓN DE QUEJAS POR MATERIA</label></h1>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">MES:</label>
                            <select class="form-control" id="ControlSelect2">
                                @foreach($meses as $cell)
                                    @if($mes == $cell->NUM)                                
                                        <option selected value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                    @else                                 
                                        <option value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                    @endif
                                @endforeach                       
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">AÑO:</label>
                            <select class="form-control" id="ControlSelect3">
                                @foreach($anios as $cell)
                                    <option selected>{!! $cell->AÑO !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    <button onclick="downloadImage(myChart, tittle1);" type="button" class="btn btn-dark btn-lg">Descargar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">   
                <canvas id="quejas-materia" width="600" height="200"></canvas>     
            </div>            
        </div>
    </div>
</div>

<br>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h1 class="">
                        <label for="">RADICACIÓN DE QUEJAS POR AUTORIDAD</label></h1>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">MES:</label>
                            <select class="form-control" id="ControlSelect4">
                                @foreach($meses as $cell)
                                    @if($mes == $cell->NUM)                                
                                        <option selected value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                    @else                                 
                                        <option value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                    @endif
                                @endforeach                       
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">AÑO:</label>
                            <select class="form-control" id="ControlSelect5">
                                @foreach($anios as $cell)
                                    <option selected>{!! $cell->AÑO !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    <button onclick="downloadImage(myChart2, tittle2);" type="button" class="btn btn-dark btn-lg">Descargar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">   
                    <canvas id="quejas-autoridad" width="600" height="200"></canvas>     
            </div>            
        </div>
    </div>
</div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" />
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.foundation.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script type="text/javascript" src="{{asset('js/control.js')}}"></script>


<script> 
    
    var myChart;
    var myChart2;

    // document.addEventListener('DOMContentLoaded', function () {
    //     const ctx = document.getElementById('quejas-materia');
    //     console.log(data);
    //     const myChart = new Chart(ctx, {
    //         type: 'bar',
    //         data: {
    //             labels: data[1],
    //             datasets: [
    //                 {
    //                 label: 'MATERIA',
    //                 backgroundColor: [
    //                     "#9f2241",
    //                     "#cf90a0",
    //                     "#db215b",
    //                     "#831336",
    //                     "#691c32",
    //                     "#b48d98",
    //                     "#541533",
    //                     "#2a0a19",
    //                     "#a98a99",
    //                     "#6b2048",
    //                     "#b58fa3",
    //                     "#351024"
    //                 ],
    //                 data: data[0],
    //                 hoverOffset: 4
    //                 },
    //             ]
    //         },
    //         options: {
    //             scales: {
    //                 yAxes: [{
    //                     ticks: {
    //                         beginAtZero: true
    //                     }
    //                 }]
    //             }
    //         },
    //     });
    // }, true);

    document.addEventListener('DOMContentLoaded', function () {
        drawChartMateria($( "#ControlSelect3" ).find(":selected").val(),$( "#ControlSelect2" ).find(":selected").val());
        console.log('-----MES Y AÑO-----');
        console.log($( "#ControlSelect4" ).find(":selected").val());
        console.log($( "#ControlSelect5" ).find(":selected").val());
        drawChartAutoridad($( "#ControlSelect5" ).find(":selected").val(),$( "#ControlSelect4" ).find(":selected").val());
        // const ctx = document.getElementById('quejas-autoridad');
        // const myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: dataa[1],
        //         datasets: [
        //             {
        //             label: 'AUTORIDADES',
        //             backgroundColor: [
        //                 "#9f2241",
        //                 "#cf90a0",
        //                 "#db215b",
        //                 "#831336",
        //                 "#691c32",
        //                 "#b48d98",
        //                 "#541533",
        //                 "#2a0a19",
        //                 "#a98a99",
        //                 "#6b2048",
        //                 "#b58fa3",
        //                 "#351024"
        //             ],
        //             data: dataa[0],
        //             hoverOffset: 4
        //             },
        //         ]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     },
        // });
    }, true);

    $('#ControlSelect2').on('change', function() {
        // var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
        // el.style.display =  'none'; 
        var mes = $(this).find(":selected").val();
        var anio = $( "#ControlSelect3" ).val();
        clearChart('quejas-materia', myChart);
        drawChartMateria(anio, mes);
        // fillTable(anio, mes,'0');
    });
    $('#ControlSelect3').on('change', function() {
        // var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
        // el.style.display =  'none'; 
        var anio = $(this).find(":selected").val();
        var mes = $( "#ControlSelect2" ).val();
        clearChart('quejas-materia', myChart);
        drawChartMateria(anio, mes);
        // fillTable(anio, mes,'0');
    });

    function drawChartMateria(anio, mes){
        tittle1 = 'RADICACIÓN DE QUEJAS POR MATERIA '+$( "#ControlSelect2" ).find(":selected").text()+' '+anio;
        $.ajax({
                type: "GET",
                url: 'radicadasMateria/'+anio+'/'+mes,
                dataType: "JSON",
                success: function(data){
                const ctx = document.getElementById('quejas-materia');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data['data'][1],
                        datasets: [
                            {
                            label: 'MATERIA',
                            backgroundColor: [
                                "#9f2241",
                                "#cf90a0",
                                "#db215b",
                                "#831336",
                                "#691c32",
                                "#b48d98",
                                "#541533",
                                "#2a0a19",
                                "#a98a99",
                                "#6b2048",
                                "#b58fa3",
                                "#351024"
                            ],
                            data: data['data'][0],
                            hoverOffset: 4
                            },
                        ]
                    },
                    options: {
                        layout: {
                            padding: 20
                        },                   
                        plugins: {                         
                            title: {
                                display: true,
                                text: tittle1,
                                padding: {
                                    top: 10,
                                    bottom: 30
                                },
                                font: {
                                    size: 40
                                }
                            },
                            customCanvasBackgroundColor: {
                                color: 'white',
                            },
                            datalabels: {
                                anchor: 'end',
                                align: 'end',
                                labels: {
                                    value: {
                                    color: '#9f2241'
                                    }
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    },
                    plugins: [plugin],
                });
            }
        });
    }

    $('#ControlSelect4').on('change', function() {
        // var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
        // el.style.display =  'none'; 
        var mes = $(this).find(":selected").val();
        var anio = $( "#ControlSelect5" ).val();
        clearChart('quejas-autoridad', myChart2);
        drawChartAutoridad(anio, mes);
        // fillTable(anio, mes,'0');
    });
    $('#ControlSelect5').on('change', function() {
        // var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
        // el.style.display =  'none'; 
        var anio = $(this).find(":selected").val();
        var mes = $( "#ControlSelect4" ).val();
        clearChart('quejas-autoridad', myChart2);
        drawChartAutoridad(anio, mes);
        // fillTable(anio, mes,'0');
    });

    function drawChartAutoridad(anio, mes){
        tittle2 = 'RADICACIÓN DE QUEJAS POR AUTORIDAD '+$( "#ControlSelect4" ).find(":selected").text()+' '+anio;
        $.ajax({
            type: "GET",
            url: 'radicadasAutoridad/'+anio+'/'+mes,
            dataType: "JSON",
            success: function(data){
                label = splitLongLabels(data['data'][1]);
                const ctx = document.getElementById('quejas-autoridad');
                myChart2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [
                            {
                            label: 'AUTORIDAD',
                            backgroundColor: [
                                "#9f2241",
                                "#cf90a0",
                                "#db215b",
                                "#831336",
                                "#691c32",
                                "#b48d98",
                                "#541533",
                                "#2a0a19",
                                "#a98a99",
                                "#6b2048",
                                "#b58fa3",
                                "#351024"
                            ],
                            data: data['data'][0],
                            hoverOffset: 4
                            },
                        ]
                    },
                    options: {
                        layout: {
                            padding: 20
                        },                   
                        plugins: {                         
                            title: {
                                display: true,
                                text: tittle2,
                                padding: {
                                    top: 10,
                                    bottom: 30
                                },
                                font: {
                                    size: 40
                                }
                            },
                            customCanvasBackgroundColor: {
                                color: 'white',
                            },
                            datalabels: {
                                anchor: 'end',
                                align: 'end',
                                labels: {
                                    value: {
                                    color: '#9f2241'
                                    }
                                }
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }],
                            
                        }
                    },
                    plugins: [plugin],
                });
            }
        });
    }

    function splitLongLabels(labels){
    //labels = ["ABC PQR", "XYZ"];  
    var i = 0, len = labels.length;
    var splitlabels = labels;
    while (i < len) {
        var words = labels[i].trim().split(' ');
        if(words.length>1){
      for(var j=0; j<words.length; j++){
      }
      splitlabels[i] = words;
        }   
        i++
        }
    
    return splitlabels;
}
</script>
@stop