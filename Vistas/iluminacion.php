<?php
//Fichero: iluminacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

require_once("../Controladores/cntrlHorario.php");
include "../Vistas/portada.php";
?>

<div  class = "container">       
    <div class="col-md-8 col-md-offset-2 ">
        <form class="condicion">
            <div class="titulo">
                <label><h4>Horarios programados </h4></label>
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
                    <input type="hidden" name="tipo" value="lampara">    
                    <?php obtenerHorarios("lampara");?>  
                    </div>
                </div>
                <div class="controls row">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".anhadir">Añadir</button>
                    <div class="modal fade anhadir" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <?php frmAñadir("lampara");?>                          
                    </div>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modificar">Act/Des</button>
                    <div class="modal fade modificar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <?php frmModificar("lampara");?>                          
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".borrar">Borrar</button>
                    <div class="modal fade borrar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <?php frmBorrar("lampara");?>                          
                    </div>
                    <a href="../Vistas/portada.php" ><input type="button" class="btn btn-default" value="Vovler"></a>
                </div>
            </div>
         </form>
        
    </div>
</div>