<?php
//Fichero : cabecera
//Creado por: ABP14/10
//-------------------------------------------------------

//comprobación si session esta logueada
session_start();
if (!(isset($_SESSION['nombre'])))
    header("location:../Vistas/login.php");
include "../Controladores/funcionalidades.php";

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
                <div class="table">
                    <div class="row sesion">
                        <?php 
                            echo $_SESSION['nombre']." - ";			        			 
                        ?>
                        <a class="enlace" href="../Vistas/desconectar.php"><?php echo "Desconectar";?></a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../Imagenes/Condicion.png" alt="..." class="imagen img-circle">
                            <input type="text" style="text-align: center" class="form-control" placeholder="Condiciones" name="humedad">
                        </div>
                        <div class="col-md-6" >
                            <img src="../Imagenes/Condicion.png" alt="..." class="imagen img-circle">
                            <input type="text" style="text-align: center"  class="form-control" placeholder="Condiciones" name="temperatura">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../Imagenes/Condicion.png" alt="..." class="imagen img-circle">
                            <input type="text" style="text-align: center" class="form-control" placeholder="Condiciones" name="iluminacion">
                        </div>
                        <div class="col-md-4">
                            <img src="../Imagenes/Condicion.png" alt="..." class="imagen img-circle">
                            <input type="text" style="text-align: center" class="form-control" placeholder="Condiciones" name="riego">
                        </div>
                        <div class="col-md-4">
                            <img src="../Imagenes/Condicion.png" alt="..." class="imagen img-circle">
                            <input type="text" style="text-align: center" class="form-control" placeholder="Condiciones" name="ventilacion">
                        </div>
                    </div>
                </div> 
                <div class="menu">
                    <div class="row">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#">Humedad</a></li>
                            <li><a href="#">Temperatura</a></li>
                            <li><a href="../Vistas/iluminacion2.php">Iluminación</a></li>
                            <li><a href="#">Riego</a></li>
                            <li><a href="#">Ventilacion</a></li>
                        </ul>
                    </div>
                </div>                     
            </form>
        </div>
    </div>
</body>