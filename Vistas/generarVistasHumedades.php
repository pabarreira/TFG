<?php
//fichero : generarVistasVentilacion.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

function vistaHumedad($hum)
{
    foreach($hum as $l){
        echo '<input type="hidden" name="idHumedad" value='.$l["idHumedad"].'>';
        echo '<div class="row">';
            echo '<div class="col-md-3">';
                echo '<input type="text" class="text" name="deseada" value='.$l["deseada"].'>';
            echo "</div>";
            echo '<div class="col-md-3">';
                echo '<input type="text" class="text" name="minima" value='.$l["minima"].'>';
            echo "</div>";
            echo '<div class="col-md-3">';
                echo '<input type="text" class="text" name="maxima" value='.$l["maxima"].'>';
            echo "</div>"; 
            echo '<div class="col-md-3 actual">';
                echo $l["actual"];
            echo "</div>";
        echo '</div>';
    }   
}


?>