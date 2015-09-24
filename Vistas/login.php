<?php
//Fichero: login.php
//Creado por: Pablo Alonso Barreira
//------------------------------------------------------

//Formulario inicial de login
?>

<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" media="screen" />
<script type="text/javascript" src="../jquery-1.11.3.min%20(1).js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


<body>
    <div  class = "container">
        <div class="col-md-6 col-md-offset-3 ">
            <form class="login" action="../Controladores/autenticar.php" method="post">
                <div class="heading"> 
                        <h2>Sign In</h2>  
                </div>
                <div class="controls">
                        <input type="text" class="form-control" placeholder="Usuario" name="login">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                </div>
                <div class="controls">
                    <input type="submit" name="accion" class="btn btn-primary col-md-5 col-xs-5" value="Validar"> 
                    <input type="reset" name="accion" class="btn btn-info col-md-5 col-xs-5 col-md-offset-2 col-xs-offset-2" value="Limpiar">
                </div>
                <div class="clearfix"></div>
                
            </form>
        </div>
    </div>
</body>
