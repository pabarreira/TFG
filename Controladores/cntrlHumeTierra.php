<?php
//fichero : cntrlHorario.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/humeTierra.php");
require_once("../Vistas/generarVistasHumedades.php");
$accion = $_REQUEST['accion']; 

function obtenerHumedades(){
    $hum=new humedad();
    $hum=$hum->getHumedades();
    vistaHumedad($hum);
}

if ($accion=="Guardar")
{
    $hum=new humedad();
    $hum->idHumedad=$_REQUEST['idHumedad'];
    $hum->maxima=$_REQUEST['maxima'];
    $hum->minima=$_REQUEST['minima'];
    $hum->deseada=$_REQUEST['deseada'];
    $hum->cambiarHumedades($hum);
    header("location:../Vistas/humeTierra.php");
}

if ($accion=="Reiniciar")
{
    $hum=new humedad();
    $hum->idHumedad=$_REQUEST['idHumedad'];
    $hum->maxima=0;
    $hum->minima=0;
    $hum->deseada=0;
    $hum->cambiarHumedades($hum);
    header("location:../Vistas/humeTierra.php");
}

?>