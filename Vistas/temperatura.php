<?php
//Fichero: iluminacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

require_once("../Controladores/cntrlTemperatura.php");
include "../Vistas/portada.php";
?>

<div  class = "container">       
    <div class="col-md-8 col-md-offset-2 ">
        <form class="condicion" action="../Controladores/cntrlTemperatura.php" method="post">
            <div class="titulo">
                <label><h4>Temperaturas </h4></label>
            </div>
            <div class="datos">
                
                <div  class = "panel panel-primary">   
                    
                    <div class="row cabeTabla">
                        <div class="col-md-3">
                            Deseada
                        </div>
                        <div class="col-md-3" >
                            Minima
                        </div>
                        <div class="col-md-3">
                            Maxima
                        </div>
                        <div class="col-md-3">
                            Actual
                        </div>
                    </div>
                    <div class="row datos2">  
                         <?php obtenerTemperaturas();?>
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