<?php
//Fichero : cabecera
//Creado por: ABP14/10
//-------------------------------------------------------

//comprobación si session esta logueada
session_start();
if (!(isset($_SESSION['nombre'])))
    header("location:../Vistas/login.php");
include "../Controladores/funcionalidades.php";
require_once("../Controladores/cntrlCondiciones.php");

?>

<!DOCTYPE html>
<html lang="es">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" media="screen" />
<script type="text/javascript" src="../jquery-1.11.3.min%20(1).js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


<body>
    <div  class = "container">
        
        <div class="col-md-8 col-md-offset-2 ">
            <form class="portada">
                <?php obtenerCondiciones();?>                              
            </form>
        </div>
    </div>
</body>