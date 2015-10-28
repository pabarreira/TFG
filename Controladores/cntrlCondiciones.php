<?php
//fichero : cntrlHorario.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/condiciones.php");
require_once("../Vistas/generarVistasCondiciones.php");
$accion = $_REQUEST['accion']; 

function obtenerCondiciones(){

        $con=new condicion();
        $con=$con->getCondiciones();
        vistaCondiciones($con);
}
?>