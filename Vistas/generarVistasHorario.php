<?php
//fichero : generarVistas.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

function vistaHorario($hor)
{
    foreach($hor as $l){
        echo '<div class="col-md-3">';
        echo $l["recordatorio"];
        echo "</div>";
        echo '<div class="col-md-3">';
        echo $l["inicio"];
        echo "</div>";
        echo '<div class="col-md-3">';
        echo $l["fin"];
        echo "</div>";
        echo '<div class="col-md-3">';
        if ($l["estado"]==1)
            echo "Activado";
        else
            echo "Desactivado";
        echo "</div>";
    }   
}

function vistaEstados($hor)
{
    foreach($hor as $l){
        echo '<div class="col-md-3">';
        echo $l["recordatorio"];
        echo "</div>";
        echo '<div class="col-md-3">';
        echo $l["inicio"];
        echo "</div>";
        echo '<div class="col-md-3">';
        echo $l["fin"];
        echo "</div>";?>
        <div class="col-md-3">
            <div class="checkbox">
                <label><?php
                    if ($l["estado"]==1)
                        echo "<input type='checkbox' name=check[] value=".$l["idHorario"]." checked>";
                    else
                        echo '<input type="checkbox" name=check[] value='.$l["idHorario"].'>';
                ?></label>
            </div>
       <?php echo "</div>";
    }   
}

function vistaAñadir(){
    ?>
    <div class="anhadirLampara col-md-4 col-md-offset-4 modal-content">
        <form class="anhadirLampara" action="../Controladores/cntrlHorario.php" method="post">
            <div class="titulo">
                <label><h4>Nuevo horario</h4></label>
            </div>
            <div class="datos">
                <div class="controls">
                    <label for="ejemplo_password_3" class="col-lg-2">Recordatorio:</label>
                    <input type="text" class="form-control" name="recordatorio" placeholder="Nuevo horario">
                    <label for="ejemplo_password_3" class="col-lg-2">Inicio:</label>
                    <input type="text" class="form-control" name="inicio" placeholder="00:00">
                     <label for="ejemplo_password_3" class="col-lg-2">Fin:</label>
                    <input type="text" class="form-control" name="fin" placeholder="00:00">
                </div> 
                <div class="controls row">
                    <input type="submit" name="accion" class="btn btn-primary col-md-5 col-xs-5" value="Validar"> 
                    <a href="../Vistas/iluminacion.php">
                        <input type="button" class="btn btn-default col-md-5 col-xs-5 col-md-offset-2 col-xs-offset-2" value="Cancelar">
                    </a>
                </div>
            </div>
            
        </form>
    </div>
    <?php 
}

function vistaModificarEstado($hor){
    ?>
    <div class="anhadirLampara col-md-4 col-md-offset-4 modal-content">
        <form class="modificarHorario" action="../Controladores/cntrlHorario.php" method="post">
           <div class="titulo">
                <label><h4>Nuevo horario</h4></label>
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
                    <?php obtenerEstados($hor);?>   
                    </div>
                </div>
                <div class="controls row">
                    <input type="submit" name="accion" class="btn btn-primary col-md-5 col-xs-5" value="Guardar"> 
                    <a href="../Vistas/iluminacion.php">
                        <input type="button" class="btn btn-default col-md-5 col-xs-5 col-md-offset-2 col-xs-offset-2" value="Cancelar">
                    </a>
                </div>
            </div>
            
        </form>
    </div>
    <?php
     
}

function vistaBorrar($hor){
    ?>
    <div class="anhadirLampara col-md-4 col-md-offset-4 modal-content">
        <form class="modificarHorario" action="../Controladores/cntrlHorario.php" method="post">
           <div class="titulo">
                <label><h4>Nuevo horario</h4></label>
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
                            Borrar?
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                        foreach($hor as $l){
                            echo '<div class="col-md-3">';
                            echo $l["recordatorio"];
                            echo "</div>";
                            echo '<div class="col-md-3">';
                            echo $l["inicio"];
                            echo "</div>";
                            echo '<div class="col-md-3">';
                            echo $l["fin"];
                            echo "</div>";
                            echo '<div class="col-md-3">';
                                echo '<div class="checkbox">';
                                    echo '<label>';
                                        echo '<input type="checkbox" name=check[] value='.$l["idHorario"].'>';
                                    echo '</label>';
                                echo '</div>';
                            echo "</div>"; 
                        }
                    ?>
                    </div>
                </div>
                <div class="controls row">
                    <input type="submit" name="accion" class="btn btn-primary col-md-5 col-xs-5" value="Borrar"> 
                    <a href="../Vistas/iluminacion.php">
                        <input type="button" class="btn btn-default col-md-5 col-xs-5 col-md-offset-2 col-xs-offset-2" value="Cancelar">
                    </a>
                </div>
            </div>
            
        </form>
    </div>
    <?php
     
}



?>