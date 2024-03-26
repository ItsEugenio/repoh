@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h1 class="">
                    <label for="">RADICACIÓN DE QUEJAS POR AÑO</label></h1>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">AÑO:</label>
                    <select class="form-control" id="ControlSelect1">
                        @foreach($anios as $cell)
                            @if($dataAnio[0] == $cell->AÑO)                                
                                <option selected value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                            @else     
                                @if($dataAnio[1] == $cell->AÑO)                             
                                    <option style="background-color:gray;" disabled value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                @else
                                    <option value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">AÑO:</label>
                    <select class="form-control" id="ControlSelect2">
                        @foreach($anios as $cell)
                            @if($dataAnio[1] == $cell->AÑO)                                
                                <option selected value="{{$cell->AÑO}}">{!! $cell->AÑO !!}</option>
                            @else     
                                @if($dataAnio[0] == $cell->AÑO)                             
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
            <button onclick="downloadImage(myChart1, tittle1);" type="button" class="btn btn-dark btn-lg">Descargar</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <canvas id="quejas-anio"  width="600" height="200"></canvas>
        <br><br>
        <table id="myTable" class="display" style="width:100%;">
            <thead>
                <tr>
                    @foreach($dataMes2 as $cell)
                        <th>{!! $cell !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rowQueja2 as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
<br>

<div class="card" id="tablaquejas" style="display: none;">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h1 class="">
                <label for="">LISTADO DE QUEJAS POR AÑO</label></h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="myTable2" class="display"  style="width:100%">
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
        var myChart1;
        var tittle1;
        var select;

        function downloadImage(myChart, name) {
            var link = document.createElement('a');
            link.href = myChart.toBase64Image();
            link.download = name+'.png';
            link.click();
        }

        $(document).ready( function () {
            $('#myTable').DataTable({
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
                initComplete: function (settings, json) {  
                    $("#myTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
                },
            });
        } );
        
        document.addEventListener('DOMContentLoaded', function () {
            drawChart1($( "#ControlSelect1" ).find(":selected").val(),$( "#ControlSelect2" ).find(":selected").val());

        }, true);
        function drawChart1(anio1, anio2){
            tittle1 = 'RADICACIÓN DE QUEJAS POR AÑO '+anio1+' - '+anio2;
            $.ajax({
                type: "GET",
                url: 'radicadas/'+anio1+'/'+anio2,
                dataType: "JSON",
                success: function(data){
                    
                    var dataMes = data[0];
                    var dataAnio = data[1];
                    var dataQueja = data[2];
                    const ctx = document.getElementById('quejas-anio');
                    myChart1 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dataMes,
                            datasets: [
                                {
                                label: dataAnio[0],
                                backgroundColor: "#bb647a",
                                borderColor: "#9f2241",
                                borderWidth: 1,
                                data: dataQueja[0]
                                },
                                {
                                label: dataAnio[1],
                                backgroundColor: "#875b70",
                                borderColor: "#541533",
                                borderWidth: 1,
                                data: dataQueja[1]
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

        $('#ControlSelect1').on('change', function() {
            var anio1 = $(this).find(":selected").val();
            var anio2 = $( "#ControlSelect2" ).val();
            $("#ControlSelect2").find("option:disabled").css("background-color", "white");
            $("#ControlSelect2").find("option:disabled").removeAttr('disabled');
            
            clearChart("quejas-anio", myChart1);
            drawChart1(anio1, anio2);
            
            $("#ControlSelect2 option[value='"+anio1+"']").prop("disabled",true);
            $("#ControlSelect2 option[value='"+anio1+"']").css("background-color", "gray");
        });
        $('#ControlSelect2').on('change', function() {
            var anio2 = $(this).find(":selected").val();
            var anio1 = $( "#ControlSelect1" ).val();
            $("#ControlSelect1").find("option:disabled").css("background-color", "white");
            $("#ControlSelect1").find("option:disabled").removeAttr('disabled');
            
            clearChart("quejas-anio", myChart1);
            drawChart1(anio1, anio2);
            
            $("#ControlSelect1 option[value='"+anio2+"']").prop("disabled",true);
            $("#ControlSelect1 option[value='"+anio2+"']").css("background-color", "gray");
        });
        function verTabla(anio){
            var table2 = $('#myTable2').DataTable();
            table2.destroy();

            var el = document.getElementById("tablaquejas"); //se define la variable "el" igual a nuestro div
            el.style.display =  'block'; 
            $table = $('#myTable2').DataTable({ 
                scrollX: true,
                fixedHeader: {
                    header: true,
                },
                fixedColumns: true,   
                destroy: true,
                deferRender: true,
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
                "ajax": '/listadoquejas/'+anio,
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
                    $("#myTable2").wrap("<div width:100%;'></div>");  
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
    </script>
@stop