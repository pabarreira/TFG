<?php
//fichero : cntrlHorario.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/temperatura.php");
require_once("../Vistas/generarVistasTemperatura.php");
$accion = $_REQUEST['accion']; 

function obtenerTemperaturas(){
    $tem=new temperatura();
    $tem=$tem->getTemperaturas();
    vistaTemperaturas($tem);
}

if ($accion=="Guardar")
{
    $tem=new temperatura();
    $tem->idTemperatura=$_REQUEST['idTemperatura'];
    $tem->maxima=$_REQUEST['maxima'];
    $tem->minima=$_REQUEST['minima'];
    $tem->deseada=$_REQUEST['deseada'];
    $tem->cambiarTemperatura($tem);
    header("location:../Vistas/temperatura.php");
}

if ($accion=="Reiniciar")
{
    $tem=new temperatura();
    $tem->idTemperatura=$_REQUEST['idTemperatura'];
    $tem->maxima=0;
    $tem->minima=0;
    $tem->deseada=0;
    $tem->cambiarTemperatura($tem);
    header("location:../Vistas/temperatura.php");
}

?>