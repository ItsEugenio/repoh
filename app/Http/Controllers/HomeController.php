<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        // phpinfo();
        return view('home');
    }

    public function getMes(){        
        $mes = date("n");
        return $mes;
    }
    public function getAnio(){        
        $anio = date("Y");
        return $anio;
    }

    public function welcome(){
        $results = DB::select('EXEC Tablero ?,?,?,?,?',["HOME",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $delmes = DB::select('EXEC Tablero ?,?,?,?,?',["CASOS-MES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $mesanio = DB::select('EXEC Tablero ?,?,?,?,?',["CASOS-MES-ANIO",HomeController::getAnio(),HomeController::getMes(),HomeController::getAnio()-1,HomeController::getMes()]);
        $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $quejas = 0;
        $orientaciones = 0;
        $atenciones = 0;
        $dataMes = [];
        $dataOJ = [];
        $dataQ = [];
        foreach ($results as $key => $value) {
            $quejas = $quejas + $value->QUEJAS;
            $orientaciones = $orientaciones + $value->ORIENTACIONES;

            
            array_push($dataMes, $value->MES);
            array_push($dataOJ, $value->ORIENTACIONES);
            array_push($dataQ, $value->QUEJAS);
        }
        $atenciones = $quejas + $orientaciones;
        $mes = $delmes[0]->MES;
        // dd($mes);
        return view('welcome', compact('atenciones','quejas','orientaciones','dataMes','dataOJ','dataQ','delmes',
                                        'mesanio','mes','anios','meses'));
    }

    public function welcome1(int $anio){
        $results = DB::select('EXEC Tablero ?,?,?,?,?',["HOME",$anio,HomeController::getMes(),"0",HomeController::getMes()]);
        $delmes = DB::select('EXEC Tablero ?,?,?,?,?',["CASOS-MES",$anio,HomeController::getMes(),"0",HomeController::getMes()]);
        $quejas = 0;
        $orientaciones = 0;
        $atenciones = 0;
        $dataMes = [];
        $dataOJ = [];
        $dataQ = [];
        $all = [];
        foreach ($results as $key => $value) {
            $quejas = $quejas + $value->QUEJAS;
            $orientaciones = $orientaciones + $value->ORIENTACIONES;

            
            array_push($dataMes, $value->MES);
            array_push($dataOJ, $value->ORIENTACIONES);
            array_push($dataQ, $value->QUEJAS);
        }
        $atenciones = $quejas + $orientaciones;
        $mes = $delmes[0]->MES;

        array_push($all, $atenciones, $quejas, $orientaciones, $dataMes, $dataQ, $dataOJ);
        return json_encode($all);
    }

    public function welcome2(int $anio, int $mes){
        $all = [];
        $delmes = DB::select('EXEC Tablero ?,?,?,?,?',["CASOS-MES",$anio,$mes,"0","0"]);
        if ($delmes == null) {   
            unset($delmes[0]);
            $vacio = ["MES" => "SIN DATO", "CASOS" => "0", "QUEJAS" => "0", "ORIENTACIONES" => "0"];
            array_push($delmes, $vacio);
        }
        return json_encode($delmes[0]);
    }

    public function welcome3(int $anio1, int $anio2, int $mes){
        $all = [];
        $mesanio = DB::select('EXEC Tablero ?,?,?,?,?',["CASOS-MES-ANIO",$anio1,$mes,$anio2,$mes]);
        if (sizeof($mesanio)<2) {
            $vacio = ["ANIO" => "EJEM","MES" => "SIN DATO", "CASOS" => "0", "QUEJAS" => "0", "ORIENTACIONES" => "0"];
            array_push($mesanio, $vacio);
        }
        return json_encode($mesanio);
    }
    
    public function radicadas(){
        $dataMes = [];
        $dataMes2 = ["AÑO"];
        $dataAnio = [];
        $dataAnio2 = [];
        $dataQueja = [];
        $rowQueja = [];
        $rowQueja2 = [];
        $quejasanio = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-ANIO",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $quejasaniomes = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-ANIO-MES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        // dd((sizeof($quejasaniomes))/sizeof($anios));
        $quejasaniomes = array_chunk($quejasaniomes, (sizeof($quejasaniomes))/sizeof($anios));
        // var_dump($quejasaniomes);
        $total = 0;
        // dd($quejasaniomes);
        foreach ($quejasaniomes as $key => $anio) {
            // dd($anio);
            array_push($rowQueja, $anio[0]->anio);
            foreach ($anio as $key => $mes) {
                // var_dump('<br><br>');
                // var_dump($mes->queja);
                array_push($rowQueja, $mes->queja);
                $total = $total+$mes->queja;
                // var_dump($mes->queja);
            }
            array_push($rowQueja, $total);
            array_push($rowQueja, '<button onclick="verTabla('.$anio[0]->anio.')" class="btn btn-sm btn-outline-info shadow" title="VER">
            <i class="fa fa-lg fa-fw fa-eye"></i>
        </button>');
            array_push($rowQueja2, $rowQueja);
            unset($rowQueja);
            $rowQueja = [];
            $total = 0;
        }
        // dd($rowQueja2);            
            
        foreach ($quejasanio as $key => $value) {
            array_push($dataMes2, $value->mes);
            array_push($dataMes, $value->mes);
            array_push($dataAnio, $value->anio);
            array_push($dataQueja, $value->queja);
        }
        $dataAnio = array_unique($dataAnio);
        
        foreach ($dataAnio as $key => $value) {
            array_push($dataAnio2, $value);
        }
        
        $dataMes2 = array_unique($dataMes2);
        array_push($dataMes2, "TOTAL");
        array_push($dataMes2, "VER");
        $dataMes = array_unique($dataMes);
        $dataAnio = ($dataAnio2);
        $dataQueja = array_chunk($dataQueja, (sizeof($dataQueja))/2);
        // dd($dataQueja);
        
        return view('radicadas', compact('dataMes','dataAnio','dataQueja','rowQueja2', 'dataMes2','anios','meses'));
    }
    public function radicadas1(int $anio1, int $anio2){
        $dataMes = [];
        $dataAnio = [];
        $dataAnio2 = [];
        $all = [];
        $dataQueja = [];
        $quejasanio = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-ANIO-SELECT",$anio1,HomeController::getMes(),$anio2,"0"]);
        // dd($rowQueja2);            
            
        foreach ($quejasanio as $key => $value) {
            array_push($dataMes, $value->mes);
            array_push($dataAnio, $value->anio);
            array_push($dataQueja, $value->queja);
        }
        $dataAnio = array_unique($dataAnio);
        foreach ($dataAnio as $key => $value) {
            array_push($dataAnio2, $value);
        }
        
        $dataMes = array_unique($dataMes);
        $dataAnio = ($dataAnio2);
        $dataQueja = array_chunk($dataQueja, (sizeof($dataQueja))/2);
        // dd($dataAnio);
        array_push($all, $dataMes);
        array_push($all, $dataAnio);
        array_push($all, $dataQueja);
        return json_encode($all);
    }

    public function quejasAnio(int $anio){
        $quejasanio = DB::select('EXEC Tablero ?,?,?,?,?',["LISTADO-QUEJAS-ANIO",$anio,"0","0","0"]);
        return datatables($quejasanio)->toJson();
    }

    public function radicadasVisitaduria(){
        // $quejasvisitaduria = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MES-VISITADURIA","0","0","0","0"]);
        $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $mes = HomeController::getMes();
        return view('radicadasVisitaduria', compact('mes','anios','meses'));
    }

    public function radicadasVisitaduria1(int $anio, int $mes){
        // dd($anio);
        $quejasvisitaduria = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MES-VISITADURIA-SELECT",$anio,$mes,"0","0"]);
        $visitaduria = [];
        $quejas = [];
        $data = [];
        foreach ($quejasvisitaduria as $key => $value) {
            array_push($visitaduria, $value->VISITADURIA);
            array_push($quejas, $value->QUEJAS);
        }
        array_push($data, $quejas);
        array_push($data, $visitaduria);
        return json_encode($data);
    }

    public function quejasVisitaduria(int $anio, int $mes, int $idAds){
        $quejas = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MES-VISITADURIA-SELECT",$anio,$mes,$idAds,"0"]);
        return datatables($quejas)->toJson();
    }

    public function listadoQuejasVisitaduria(int $anio, int $mes, int $idAds){
        $quejas = DB::select('EXEC Tablero ?,?,?,?,?',["LISTADO-QUEJAS-MES-VISITADURIA",$anio,$mes,$idAds,"0"]);
        return datatables($quejas)->toJson();
    }

    public function radicadasMateria(){
        $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $mes = HomeController::getMes();
        // $quejasmateria = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MATERIA","0","0","0","0"]);
        // $quejasautoridad = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-AUTORIDAD","0","0","0","0"]);
        // $materia = [];
        // $quejas = [];
        // $data = [];

        // $autoridad = [];
        // $quejasa = [];
        // $dataa = [];
        // foreach ($quejasmateria as $key => $value) {
        //     array_push($materia, $value->MATERIA);
        //     array_push($quejas, $value->QUEJAS);
        // }

        // foreach ($quejasautoridad as $key => $value) {
        //     array_push($autoridad, $value->AUTORIDAD);
        //     array_push($quejasa, $value->QUEJAS);
        // }
        // array_push($data, $quejas);
        // array_push($data, $materia);

        // array_push($dataa, $quejasa);
        // array_push($dataa, $autoridad);
        // // $data = datatables($data)->toJson();
        return view('radicadasMateria', compact('anios','meses','mes'));
    }

    public function radicadasMateria1(int $anio, int $mes){
        // $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        // $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        // $mes = HomeController::getMes();
        $quejasmateria = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MATERIA-SELECT",$anio,$mes,"0","0"]);
        // $quejasautoridad = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-AUTORIDAD","0","0","0","0"]);
        $materia = [];
        $quejas = [];
        $data = [];
        foreach ($quejasmateria as $key => $value) {
            array_push($materia, $value->MATERIA);
            array_push($quejas, $value->QUEJAS);
        }
        array_push($data, $quejas);
        array_push($data, $materia);
        return datatables($data)->toJson();
        // return view('radicadasMateria', compact('anios','meses','mes','data','quejasmateria','dataa','quejasautoridad'));
    }

    public function radicadasAutoridad(int $anio, int $mes){
        // $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        // $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        // $mes = HomeController::getMes();
        // $quejasmateria = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-MATERIA-SELECT",$anio,$mes,"0","0"]);
        $quejasautoridad = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-AUTORIDAD-SELECT",$anio,$mes,"0","0"]);
        $autoridad = [];
        $quejas = [];
        $data = [];
        foreach ($quejasautoridad as $key => $value) {
            array_push($autoridad, $value->AUTORIDAD);
            array_push($quejas, $value->QUEJAS);
        }
        array_push($data, $quejas);
        array_push($data, $autoridad);
        return datatables($data)->toJson();
        // return view('radicadasMateria', compact('anios','meses','mes','data','quejasmateria','dataa','quejasautoridad'));
    }

    public function tramite(){
        $anios = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-AÑOS",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $meses = DB::select('EXEC Tablero ?,?,?,?,?',["SELECT-MESES",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $mes = HomeController::getMes();

        $quejas = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-TRAMITE",HomeController::getAnio(),HomeController::getMes(),"0","0"]);
        $dataQueja = [];
        $rowQueja = [];
        $rowQueja2 = [];

        foreach ($quejas as $key => $value) {
            array_push($rowQueja, $value->anio);
            array_push($rowQueja2, $value->quejas);
        }
        array_push($dataQueja, $rowQueja);
        array_push($dataQueja, $rowQueja2);
        // dd($dataQueja);
        return view('tramite', compact('mes','anios','meses'));
    }

    public function tramite1(int $anio, int $mes, int $opc){

        $quejas = DB::select('EXEC Tablero ?,?,?,?,?',["QUEJAS-TRAMITE",$anio,$mes,"0","0"]);
        $dataQueja = [];
        $rowQueja = [];
        $rowQueja2 = [];

        foreach ($quejas as $key => $value) {
            array_push($rowQueja, $value->anio);
            array_push($rowQueja2, $value->quejas);
        }
        array_push($dataQueja, $rowQueja);
        array_push($dataQueja, $rowQueja2);
        // dd($dataQueja);
        return json_encode($dataQueja);
    }
}
