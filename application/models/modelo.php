<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelo extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  function kpi1(){
    date_default_timezone_set('Chile/Continental');
    $hoy = date("Y-m-d H:i:s");
    $fecha = explode(" ",$hoy)[0];
    $hora = explode(" ",$hoy)[1];
    $nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
    $retorno = array();
    $kilnet_conhidro = 0;
    $kilnet_sinhidro = 0;
    $total_kilos = 0;

    $estado = 0;
    $conhidro_cumple = 0;
    $conhidro_nocumple = 0;
    $sinhidro_cumple = 0;
    $sinhidro_nocumple = 0;

    $asd;

    $copefrut = $this->load->database('copefrut', TRUE);
    $query = "exec dba.FGran_Informe_Recepcion_FGranel_Diaria N'4700',N'-1',N'-1',N'-1',N'-1',N'*',N'-1',N'-1',N'1',N'-1','".$nuevafecha." 00:00:00', '".$fecha." 23:59:00',N'0',N'709',N'-1',N'-1',N'2018'";
    $result = odbc_exec($copefrut->conn_id, $query);
    while(odbc_fetch_array($result)){
      $total_kilos += odbc_result($result, "kilnet");
  	  $salida = new DateTime(odbc_result($result,'refg_horasa'));
      $entrada = new DateTime(odbc_result($result,'refg_horaen'));
      $tiempo = $salida->diff($entrada);
  		$minutos=intval($tiempo->i)+(intval($tiempo->h))*60+(intval($tiempo->s))/60;
      if (odbc_result($result, "cama_codigo") == 78) {

    		if($minutos<60){
    		    $conhidro_cumple=$conhidro_cumple+odbc_result($result, "kilnet");
    		}else{
    		    $conhidro_nocumple=$conhidro_nocumple+odbc_result($result, "kilnet");
    		}
        $kilnet_conhidro += odbc_result($result, "kilnet");
      } else {
    		if($minutos<60){
    		    $sinhidro_cumple=$sinhidro_cumple+odbc_result($result, "kilnet");
    		}else{
    		    $sinhidro_nocumple=$sinhidro_nocumple+odbc_result($result, "kilnet");
    		}
        $kilnet_sinhidro += odbc_result($result, "kilnet");
      }
    }

    $color_cumple = "";
    if ((($sinhidro_cumple/$kilnet_sinhidro)*100) >= 80) {
      $color_cumple = "darkgreen";
    }

    $color_nocumple = "";
    if ((($sinhidro_nocumple/$kilnet_sinhidro)*100) < 80) {
      $color_nocumple = "darkred";
    }

    // array_push($retorno,array("label"=>"CON HIDRO - Cumple","y"=>($conhidro_cumple/$kilnet_conhidro)*100,"color"=>"darkgreen"));
	  // array_push($retorno,array("label"=>"CON HIDRO - No cumple","y"=>($conhidro_nocumple/$kilnet_conhidro)*100,"color"=>"darkred"));
    array_push($retorno,array("label"=>"SIN HIDRO - Cumple","y"=>($sinhidro_cumple/$kilnet_sinhidro)*100,"color"=>$color_cumple));
	  // array_push($retorno,array("label"=>"SIN HIDRO - Cumple","y"=>70,"color"=>"darkgreen"));
    array_push($retorno,array("label"=>"SIN HIDRO - No cumple","y"=>($sinhidro_nocumple/$kilnet_sinhidro)*100,"color"=>$color_nocumple));
	  // array_push($retorno,array("label"=>"SIN HIDRO - No cumple","y"=>30,"color"=>"darkred"));




    return $retorno;
  }

  function kpi2(){
   date_default_timezone_set('Chile/Continental');
    $retorno = array();
    $kilos = 0;
    $hrs24 = 0;
    $hrs48 = 0;
    $hrs72=0;

    $estado = 0;
    $conhidro_cumple = 0;
    $conhidro_nocumple = 0;
    $sinhidro_cumple = 0;
    $sinhidro_nocumple = 0;

      $copefrut = $this->load->database('copefrut', TRUE);
   // $query = "exec dba.FGran_Informe_Recepcion_FGranel_Diaria N'4700',N'-1',N'-1',N'-1',N'-1',N'*',N'-1',N'-1',N'1',N'-1','".$nuevafecha." 00:00:00', '".$fecha." 23:59:00',N'0',N'709',N'-1',N'-1',N'2018'";

	  $query = "exec dba.FGran_Informe_Existencia_Camara N'10000',N'10000',N'10000',N'100',N'100',N'100',N'100',N'10000',N'*',N'-1',N'1000',N'10000',N'0',N'10000',N'0',N'-1',N'1000',N'1000',N'0',N'-1',N'2018','20190130 23:59:00',-1";

    $result = odbc_exec($copefrut->conn_id, $query);
    while(odbc_fetch_array($result)){


 $kilos += odbc_result($result, "Kilos");


      if (odbc_result($result, "dias_enfrio") == 1) {
        $hrs24+= odbc_result($result, "Kilos");
		}elseif(odbc_result($result, "dias_enfrio") == 2){
		$hrs48+= odbc_result($result, "Kilos");
		}else{

		$hrs72+= odbc_result($result, "Kilos");

		}


    }
	array_push($retorno,array("label"=>"24HRS","y"=>($hrs24/$kilos)*100,"color"=>"yellow"));
	array_push($retorno,array("label"=>"48HRS","y"=>($hrs48/$kilos)*100,"color"=>"darkgreen"));
	array_push($retorno,array("label"=>"72HRS O MÁS","y"=>($hrs72/$kilos)*100,"color"=>"darkred"));




    return $retorno;

  }

  function kpi3(){
    return true;
  }

  function kpi4(){
    return true;
  }

}
