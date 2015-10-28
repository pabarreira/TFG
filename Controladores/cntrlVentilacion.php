<?php
//fichero : cntrlHorario.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/ventilador.php");
require_once("../Vistas/generarVistasVentilacion.php");
$accion = $_REQUEST['accion']; 

function obtenerVentilacion(){
        $ven=new ventilador();
        $ven=$ven->getVentiladores();
        vistaVentiladores($ven);
}

if ($accion=="Guardar")
{
    
    $ven=new ventilador();
    $ven=$ven->getVentiladores();
    $vin= new ventilador();
    $pot=$_REQUEST['potencia'];
    $activos = new ventilador();
    $desactivados = new ventilador();
    foreach($ven as $l){
        if(in_array($l["idVentilador"], $_REQUEST['check']))
        {
            $activos->activar($l);
        }
        else
        {        
            $desactivados->desactivar($l);
        }
    }
    $i=0;
    foreach($ven as $v){        
        $vin->cambiarPotencia($v, $pot[$i]);
        $i++;
    }
    header("location:../Vistas/ventilacion.php");
}

if ($accion=="Reiniciar")
{
    
    $ven=new ventilador();
    $ven=$ven->getVentiladores();
    $desactivados = new ventilador();
    foreach($ven as $v){  
        $desactivados->cambiarPotencia($v, 0);
        $desactivados->desactivar($v);
    }
    header("location:../Vistas/ventilacion.php");
}


?>