<?php
//fichero : generarVistasVentilacion.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

function vistaVentiladores($ven)
{
    foreach($ven as $l){
        echo '<div class="row">';
            echo '<div class="col-md-3">';
                echo '<img src="../Imagenes/ventilador.png">';
            echo "</div>";            
            echo '<div class="col-md-3">';
                echo $l["nombre"];
            echo "</div>";
            echo '<div class="col-md-3">';
        
                echo '<select name=potencia[]>';
                for ($i = 0; $i <= 100; $i = $i + 10) {
					if ($l["potencia"]== $i)
						echo '<option selected value='.$i.'>'.$i.'</option>';
					else
						echo '<option value='.$i.'>'.$i.'</option>';					
                }
				echo "</select>";
        
            echo "</div>";?>
            <div class="col-md-3">
                <div class="checkbox">
                    <label><?php
                        if ($l["estado"]==1)
                            echo "<input type='checkbox' name=check[] value=".$l["idVentilador"]." checked>";
                        else
                            echo '<input type="checkbox" name=check[] value='.$l["idVentilador"].'>';
                    ?></label>
                </div>
           <?php echo "</div>";
        echo '</div>';
    }   
}

?>