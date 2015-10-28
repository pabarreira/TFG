<?php
//fichero : cntrlHorario.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/horario.php");
require_once("../Vistas/generarVistasHorario.php");
$accion = $_REQUEST['accion']; 

function obtenerHorarios($opc){
        $hor=new horario();
        $hor=$hor->getHorarios($opc);
        vistaHorario($hor);
}

function obtenerEstados($hor){
    vistaEstados($hor);
}

function frmAñadir($opc){
    vistaAñadir();
}

function frmModificar($opc){
    $hor=new horario();
    $hor=$hor->getHorarios($opc);
    vistaModificarEstado($hor);
}

function frmBorrar($opc){
    $hor=new horario();
    $hor=$hor->getHorarios($opc);
    vistaBorrar($hor);
}



if ($accion=="Validar")
{
	$hor= new horario();  
	$hor->inicio=$_REQUEST['inicio']; 
	$hor->fin=$_REQUEST['fin'];
    $hor->recordatorio=$_REQUEST['recordatorio'];
    $hor->estado=0;
    $hor->tipo=$_REQUEST['tipo'];
	$hor->añadirHorario($hor);
}

if ($accion=="Guardar")
{
    $hor=new horario();
    $hor=$hor->getHorarios($opc);
    $activos = new horario();
    $desactivados = new horario();
    foreach($hor as $l){
        if(in_array($l["idHorario"], $_REQUEST['check']))
        {
            $activos->activar($l);
        }
        else
        {        
            $desactivados->desactivar($l);
        }
    }
    if($_REQUEST['tipo']=="lampara")
        header("location:../Vistas/iluminacion.php");
    else
        header("location:../Vistas/riego.php");
}

if ($accion=="Borrar")
{
	$hor= new horario();  
	$hor->getHorarios($opc);
    $hor->borrar($_REQUEST['check']);
    if($_REQUEST['tipo']=="lampara")
        header("location:../Vistas/iluminacion.php");
    else
        header("location:../Vistas/riego.php");
}

?>