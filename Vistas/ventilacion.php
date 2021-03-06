<?php
//Fichero: iluminacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

require_once("../Controladores/cntrlVentilacion.php");
include "../Vistas/portada.php";
?>

<div  class = "container">       
    <div class="col-md-8 col-md-offset-2 ">
        <form class="condicion" action="../Controladores/cntrlVentilacion.php" method="post">
            <div class="titulo">
                <label><h4>Ventiladores </h4></label>
            </div>
            <div class="datos">
                
                <div  class = "panel panel-primary">   
                    
                    <div class="row">
                        <div class="col-md-3">
                            Horario
                        </div>
                        <div class="col-md-3" >
                            Inicio
                        </div>
                        <div class="col-md-3">
                            Fin
                        </div>
                        <div class="col-md-3" >
                            On/Off
                        </div>
                    </div>
                    <div class="row">                     
                     <?php obtenerVentilacion();?>
                    </div>
                </div>
                <div class="controls row">
                    <button type="submit" name="accion" class="btn btn-warning" value="Guardar">Guardar</button>
                    <button type="submit" name="accion" class="btn btn-danger" value="Reiniciar">Reiniciar</button>
                    <a href="../Vistas/portada.php" ><input type="button" class="btn btn-default" value="Vovler"></a>
                </div>
            </div>
         </form>
        
    </div>
</div>