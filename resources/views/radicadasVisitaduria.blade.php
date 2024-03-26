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
                        <label for="">RADICACIÓN DE QUEJAS POR VISITADURÍA</label></h1>
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
                <div class="row">
                    <div class="col-12">
                        <canvas id="quejas-visitaduria" width="600" height="200"></canvas>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="myTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>VISITADURÍA</th>
                                    <th>TOTAL</th>
                                    <th>PORCENTAJE</th>
                                    <th>VER</th>
                                </tr>
                            </thead>
                        </table>  
                    </div>
                </div>

            </div>            
        </div>
    </div>
</div>

<br>
<div class="card" id="tablaquejas" style="display: none;">
    <div class="card-header">
        <h2 class="card-title">LISTADO DE QUEJAS POR AÑO</h2>
    </div>
    <div class="card-body">
        <table id="myTable2" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>QUEJA</th>
                    <th>FECHA</th>
                    <th>ESTATUS</th>
                    <th>VISITADURIA</th>
                    <th>TRAMITADOR</th>
                    <th>MUNICIPIO</th>
                    <th>MATERIAS</th>
                    <th>AUTORIDADES</th>
                </tr>
            </thead>
        </table>
    </div>    
</div>

<br>
    <script>
        
        
    </script>

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
        

        document.addEventListener('DOMContentLoaded', function () {
            var mes = $( "#ControlSelect2" ).val();
            var anio = $( "#ControlSelect3" ).val();
            drawChart(anio,mes);
            fillTable(anio,mes,'0');
        }, true);

        function verTabla(idads){
            var mes = $( "#ControlSelect2" ).val();
            var anio = $( "#ControlSelect3" ).val();
            var table2 = $('#myTable2').DataTable();
            table2.destroy();

            var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
            el.style.display =  'block'; 
            table2 = $('#myTable2').DataTable({ 
                scrollX: true,
                fixedHeader: {
                    header: true,
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                    extend: 'excelHtml5',
                    text: 'EXCEL',    
                    className: 'btn btn-success'
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                fixedColumns: true,   
                destroy: true,
                deferRender: true,
                "ajax": '/listadoquejasvisitaduria2/'+anio+'/'+mes+'/'+idads,
                "columns": [
                    {"title": "QUEJA",data:'QUEJA'},
                    {"title": "FECHA",data:'FECHA'},
                    {"title": "ESTATUS",data:'ESTATUS'},
                    {"title": "VISITADURIA",data:'VISITADURIA'},
                    {"title": "TRAMITADOR",data:'TRAMITADOR'},
                    {"title": "MUNICIPIO",data:'MUNICIPIO'},
                    {"title": "MATERIAS",data:'MATERIAS'},
                    {"title": "AUTORIDADES",data:'AUTORIDADES'}
                ],
                initComplete: function () {
                    this.api().columns().every(function () {  
                        var column = this;
                        select = $('<select class="form-select" style="width:100%"><option value=""> -- Seleccionar -- </option></select>')
                            .appendTo($(column.header()))
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
        }

        function drawChart(anio, mes){
            tittle1 = 'RADICACIÓN DE QUEJAS POR VISITADURÍA '+$( "#ControlSelect2" ).find(":selected").text()+' '+anio;
            $.ajax({
                type: "GET",
                url: 'radicadasVisitaduria/'+anio+'/'+mes,
                dataType: "JSON",
                success: function(data){
                    const array = data[1];

                    const index = data[1].indexOf('TOTAL');
                    if (index > -1) { // only splice array when item is found
                        data[0].splice(index, 1); // 2nd parameter means remove one item only
                        data[1].splice(index, 1); // 2nd parameter means remove one item only
                    }
                    const ctx = document.getElementById('quejas-visitaduria');
                    console.log(data);
                    myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: data[1],
                            datasets: [
                                {
                                backgroundColor: [
                                    "#22092C",
                                    "#BE3144",
                                    "#F05941",
                                    "#071952",
                                    "#088395",
                                    "#D83F31",
                                    "#EE9322",
                                    "#2a0a19",
                                    "#7E1717",
                                    "#db215b",
                                    "#219C90",
                                    "#241468"
                                ],
                                data: data[0],
                                hoverOffset: 4
                                },
                            ]
                        },
                        options: {
                            radius: '90%',
                            layout: {
                                padding: 20
                            },                   
                            plugins: {                         
                                title: {
                                    display: true,
                                    text: 'RADICACIÓN DE QUEJAS POR VISITADURÍA',
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
                                    formatter: function(value, index, values) {
                                        if(value >0 ){
                                            value = value.toString();
                                            value = value.split(/(?=(?:...)*$)/);
                                            value = value.join(',');
                                            return value;
                                        }else{
                                            value = "";
                                            return value;
                                        }
                                    },
                                    display: true,
                                    align: 'end',
                                    anchor: 'end',
                                    labels: {
                                        value: {
                                            color: 'black',
                                            font: {
                                                size: 20
                                            }
                                        }
                                    }
                                }
                            },
                        },
                        plugins: [plugin],
                    });
                    
                }
            });            
        }

        function fillTable(anio, mes, ads){
            var table = $('#myTable').DataTable();
            table.destroy();

            // var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
            // el.style.display =  'block'; 
            table = $('#myTable').DataTable({ 
                order: [[ 1, 'asc' ]],
                paging: false,
                searching: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                    extend: 'excelHtml5',
                    text: 'EXCEL',    
                    className: 'btn btn-success'
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                fixedColumns: true,   
                destroy: true,
                deferRender: true,
                "ajax": '/listadoquejasvisitaduria/'+anio+'/'+mes+'/'+ads,
                "columns": [
                    {"title": "VISITADURIA",data:'VISITADURIA',"width": "60%"},
                    {"title": "TOTAL",data:'QUEJAS',"width": "15%"},
                    {"title": "PORCENTAJE",data:'PORCENTAJE',"width": "15%"},
                    {"title": "VER",data:'ID',"width": "10%", defaultContent: '<button>Click!</button>',
                        render: function ( data, type, row ) {
                            if (row['QUEJAS'] == 0){
                                return '<td><button disabled onclick="verTabla('+data+')" class="btn btn-sm btn-outline-info shadow" title="VER"><i class="fa fa-lg fa-fw fa-eye"></i></button></td>'; 
                            }else{
                                return '<td><button onclick="verTabla('+data+')" class="btn btn-sm btn-outline-info shadow" title="VER"><i class="fa fa-lg fa-fw fa-eye"></i></button></td>'; 
                            }
                        }}    
                ],
            });
        }

        $('#ControlSelect2').on('change', function() {
            var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
            el.style.display =  'none'; 
            var mes = $(this).find(":selected").val();
            var anio = $( "#ControlSelect3" ).val();
            clearChart('quejas-visitaduria', myChart);
            drawChart(anio, mes);
            fillTable(anio, mes,'0');
        });
        $('#ControlSelect3').on('change', function() {
            var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
            el.style.display =  'none'; 
            var anio = $(this).find(":selected").val();
            var mes = $( "#ControlSelect2" ).val();
            clearChart('quejas-visitaduria', myChart);
            drawChart(anio, mes);
            fillTable(anio, mes,'0');
        });
    </script>
@stop