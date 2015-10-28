<?php
//fichero : generarVistasVentilacion.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

function vistaTemperaturas($tem)
{
    foreach($tem as $l){
        echo '<input type="hidden" name="idTemperatura" value='.$l["idTemperatura"].'>';
        echo '<div class="row">';
            echo '<div class="col-md-3 ">';
                echo '<input type="text" class="text" name="deseada" value='.$l["deseada"].'>';
            echo "</div>";
            echo '<div class="col-md-3 ">';
                echo '<input type="text" class="text" name="minima" value='.$l["minima"].'>';
            echo "</div>";
            echo '<div class="col-md-3 ">';
                echo '<input type="text" class="text" name="maxima" value='.$l["maxima"].'>';
            echo "</div>"; 
            echo '<div class="col-md-3 actual">';
                echo $l["actual"];
            echo "</div>";
        echo '</div>';
    }   
}

?>