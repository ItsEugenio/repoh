@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bienvenido!</h1>
@stop

@section('content')


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h1 class="">
                    <label for="">RADICADAS</label></h1>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">AÑO:</label>
                    <select class="form-control" id="ControlSelect1">
                        @foreach($anios as $cell)
                            <option selected>{!! $cell->AÑO !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
            <button onclick="downloadImage(myChart1, tittle1);" type="button" class="btn btn-dark btn-lg">Descargar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col col-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ATENCIONES RADICADAS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="text-align: right;">
                                <h1 id="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                <style>svg{fill:#000000}</style><path d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
                                </h1>
                            </div>
                            <div class="col-8">
                                <h1 id="atenciones">{{ $atenciones}}
                                </h1>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col col-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">ORIENTACIONES</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="text-align: right;">
                                <h1 id="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
                                </h1>
                            </div>
                            <div class="col-8">
                                <h1 id="orientaciones">{{ $orientaciones}}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">QUEJAS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="text-align: right;">
                                <h1 id="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"/></svg>
                                </h1>
                            </div>
                            <div class="col-8">
                                <h1 id="quejas">{{ $quejas}}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="home" width="600" height="200"></canvas>
    </div>
    
</div>
<br>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h1 class="">
                    <label for="">CASOS DEL MES</label></h1>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">MES:</label>
                    <select class="form-control" id="ControlSelect2">
                        @foreach($meses as $cell)
                            @if($mes == $cell->MES)                                
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
            <button onclick="downloadImage(myChart2, tittle2);" type="button" class="btn btn-dark btn-lg">Descargar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <canvas id="delmes" width="600" height="200"></canvas>
    </div>
    
</div>
<br>
<div class="card">
    <div class="card-header">
        <div class="row">
                <div class="col-6">
                    <h1 class="">
                        <label for="">CASOS DEL MES COMPARADO POR AÑO</label></h1>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">MES:</label>
                        <select class="form-control" id="ControlSelect4">
                            @foreach($meses as $cell)
                                @if($mes == $cell->MES)                                
                                    <option selected value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                @else                                 
                                    <option value="{{$cell->NUM}}">{!! $cell->MES !!}</option>
                                @endif
                            @endforeach                       
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">AÑO:</label>
                        <select class="form-control" id="ControlSelect5">
                            @foreach($anios as $cell)
                                @if($mesanio[0]->ANIO == $cell->AÑO)                                
                                    <option selected value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                @else     
                                    @if($mesanio[1]->ANIO == $cell->AÑO)                             
                                        <option style="background-color:gray;" disabled value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                    @else
                                        <option value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">AÑO:</label>
                        <select class="form-control" id="ControlSelect6">
                            @foreach($anios as $cell)
                                @if($mesanio[1]->ANIO == $cell->AÑO)                                
                                    <option selected value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                @else     
                                    @if($mesanio[0]->ANIO == $cell->AÑO)                             
                                        <option style="background-color:gray;" disabled value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                    @else
                                        <option value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
            <button onclick="downloadImage(myChart3, tittle3);" type="button" class="btn btn-dark btn-lg">Descargar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <canvas id="mesanio" width="600" height="200"></canvas>
    </div>
    
</div>
<br>


@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.foundation.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.foundation.min.css" /> -->
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
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
        var mes = {{ Js::from($dataMes) }};
        var queja = {{ Js::from($dataQ) }};
        var oj = {{ Js::from($dataOJ) }};
        var myChart1;
        var myChart2;
        var myChart3;
        var tittle1;
        var tittle2;
        var tittle3;       

        //GRAFICA 1
        document.addEventListener('DOMContentLoaded', function () {
            var anio = $(this).find(":selected").val();
            tittle1 = 'RADICADAS '+anio;
            const ctx = document.getElementById('home');
            myChart1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: mes,
                    datasets: [
                        {
                        label: "ORIENTACIONES",
                        backgroundColor: "#bb647a",
                        borderColor: "#9f2241",
                        borderWidth: 1,
                        data: oj
                        },
                        {
                        label: "QUEJAS",
                        backgroundColor: "#875b70",
                        borderColor: "#541533",
                        borderWidth: 1,
                        data: queja
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
        }, true);
        

        //GRAFICA 1 CON SELECT
        $('#ControlSelect1').on('change', function() {
            var anio = $(this).find(":selected").val();
            tittle1 = 'RADICADAS '+anio;
            $.ajax({
                type: "GET",
                url: 'welcome/'+anio,
                dataType: "JSON",
                success: function(data){
                    console.log('------------');
                    console.log(data);
                    clearChart("home", myChart1);
                    var a = document.getElementById("atenciones")
                    var o = document.getElementById("orientaciones")
                    var q = document.getElementById("quejas")
                    a.innerHTML = data[0];
                    q.innerHTML = data[1];
                    o.innerHTML = data[2];

                    var mes = data[3];
                    var queja = data[4];
                    var oj =  data[5];
                    const ctx = document.getElementById('home');
                    myChart1 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: mes,
                            datasets: [
                                {
                                label: "ORIENTACIONES",
                                backgroundColor: "#bb647a",
                                borderColor: "#9f2241",
                                borderWidth: 1,
                                data: oj
                                },
                                {
                                label: "QUEJAS",
                                backgroundColor: "#875b70",
                                borderColor: "#541533",
                                borderWidth: 1,
                                data: queja
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
        });

        //GRAFICA 2
        var delmes = {{ Js::from($delmes[0]) }};        
        document.addEventListener('DOMContentLoaded', function () {
            var mes = $( "#ControlSelect2" ).find(":selected").text();
            var anio = $( "#ControlSelect3" ).val();
            tittle2 = 'CASOS DEL MES DE '+mes+' '+anio;
            const ctx = document.getElementById('delmes');
            myChart2 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["ATENCIONES"],
                    datasets: [
                        {
                        label: "CASOS",
                        backgroundColor: "#bb647a",
                        borderColor: "#9f2241",
                        borderWidth: 1,
                        data: [delmes["CASOS"]],
                        },
                        {
                        label: "ORIENTACIONES",
                        backgroundColor: "#96606f",
                        borderColor: "#691c32",
                        borderWidth: 1,
                        data: [delmes["ORIENTACIONES"]]
                        },
                        {
                        label: "QUEJAS",
                        backgroundColor: "#e5638c",
                        borderColor: "#db215b",
                        borderWidth: 1,
                        data: [delmes["QUEJAS"]]
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
                        }]
                    }
                },
                plugins: [plugin],
            });
        }, true);

        //GRAFICA 2 CON SELECT
        $('#ControlSelect2').on('change', function() {
            var mes = $(this).find(":selected").val();
            var anio = $( "#ControlSelect3" ).val();
            delmes1(mes, anio);
        });
        $('#ControlSelect3').on('change', function() {
            var anio = $(this).find(":selected").val();
            var mes = $( "#ControlSelect2" ).val();
            delmes1(mes, anio);
        });

        function delmes1(mes1, anio1){
            tittle2 = 'CASOS DEL MES DE '+$( "#ControlSelect2" ).find(":selected").text()+' '+anio1;
            $.ajax({
                type: "GET",
                url: 'welcome/'+anio1+'/'+mes1,
                dataType: "JSON",
                success: function(data){
                    clearChart("delmes", myChart2);                    
                    var delmes = data;
                    const ctx = document.getElementById('delmes');
                    myChart2 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["ATENCIONES"],
                            datasets: [
                                {
                                label: "CASOS",
                                backgroundColor: "#bb647a",
                                borderColor: "#9f2241",
                                borderWidth: 1,
                                data: [delmes["CASOS"]],
                                },
                                {
                                label: "ORIENTACIONES",
                                backgroundColor: "#96606f",
                                borderColor: "#691c32",
                                borderWidth: 1,
                                data: [delmes["ORIENTACIONES"]]
                                },
                                {
                                label: "QUEJAS",
                                backgroundColor: "#e5638c",
                                borderColor: "#db215b",
                                borderWidth: 1,
                                data: [delmes["QUEJAS"]]
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
                                }]
                            }
                        },
                        plugins: [plugin],
                    });
                }
            });
        }

        
        //GRAFICA 3
        var mesanio = {{ Js::from($mesanio) }};
        document.addEventListener('DOMContentLoaded', function () {
            var mes = $( "#ControlSelect4" ).find(":selected").text();
            var anio1 = $( "#ControlSelect5" ).find(":selected").text();
            var anio2 = $( "#ControlSelect6" ).find(":selected").text();
            tittle3 = 'CASOS DEL MES DE '+mes+' '+anio1+' - '+anio2;
            const ctx = document.getElementById('mesanio');
            myChart3 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["CASOS","ORIENTACIONES","QUEJAS"],
                    datasets: [
                        {
                        label: mesanio[0]["ANIO"],
                        backgroundColor: "#bb647a",
                        borderColor: "#9f2241",
                        borderWidth: 1,
                        data: [mesanio[0]["CASOS"],mesanio[0]["ORIENTACIONES"],mesanio[0]["QUEJAS"]],
                        },
                        {
                        label: mesanio[1]["ANIO"],
                        backgroundColor: "#875b70",
                        borderColor: "#541533",
                        borderWidth: 1,
                        data: [mesanio[1]["CASOS"],mesanio[1]["ORIENTACIONES"],mesanio[1]["QUEJAS"]],
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
                            text: tittle3,
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
        }, true);


        $('#ControlSelect4').on('change', function() {
            var mes = $(this).find(":selected").val();
            var anio1 = $( "#ControlSelect5" ).val();
            var anio2 = $( "#ControlSelect6" ).val();
            delmesanio(mes, anio1, anio2);            
        });
        $('#ControlSelect5').on('change', function() {
            var anio1 = $(this).find(":selected").val();
            var mes = $( "#ControlSelect4" ).val();
            var anio2 = $( "#ControlSelect6" ).val();
            $("#ControlSelect6").find("option:disabled").css("background-color", "white");
            $("#ControlSelect6").find("option:disabled").removeAttr('disabled');
            delmesanio(mes, anio1, anio2);
            
            $("#ControlSelect6 option[value='"+anio1+"']").prop("disabled",true);
            $("#ControlSelect6 option[value='"+anio1+"']").css("background-color", "gray");
        });
        $('#ControlSelect6').on('change', function() {
            var anio2 = $(this).find(":selected").val();
            var mes = $( "#ControlSelect4" ).val();
            var anio1 = $( "#ControlSelect5" ).val();
            $("#ControlSelect5").find("option:disabled").css("background-color", "white");
            $("#ControlSelect5").find("option:disabled").removeAttr('disabled');
            delmesanio(mes, anio1, anio2);
            
            $("#ControlSelect5 option[value='"+anio2+"']").prop("disabled",true);
            $("#ControlSelect5 option[value='"+anio2+"']").css("background-color", "gray");
        });
        function delmesanio(mes, anio1, anio2){
            tittle3 = 'CASOS DEL MES DE '+$( "#ControlSelect4" ).find(":selected").text()+' '+anio1+' - '+anio2;
            $.ajax({
                type: "GET",
                url: 'welcome/'+anio1+'/'+anio2+'/'+mes,
                dataType: "JSON",
                success: function(data){ 
                    var mesanio = data;
                    clearChart("mesanio", myChart3);
                    const ctx = document.getElementById('mesanio');
                    myChart3 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["CASOS","ORIENTACIONES","QUEJAS"],
                            datasets: [
                                {
                                label: mesanio[0]["ANIO"],
                                backgroundColor: "#bb647a",
                                borderColor: "#9f2241",
                                borderWidth: 1,
                                data: [mesanio[0]["CASOS"],mesanio[0]["ORIENTACIONES"],mesanio[0]["QUEJAS"]],
                                },
                                {
                                label: mesanio[1]["ANIO"],
                                backgroundColor: "#875b70",
                                borderColor: "#541533",
                                borderWidth: 1,
                                data: [mesanio[1]["CASOS"],mesanio[1]["ORIENTACIONES"],mesanio[1]["QUEJAS"]],
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
                                    text: tittle3,
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
    </script>
@stop