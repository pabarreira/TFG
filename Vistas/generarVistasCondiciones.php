<?php
//fichero : generarVistas.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

function vistaCondiciones($con){
    foreach($con as $c){
    ?>
        <div class="table">
            <div class="row sesion">
                <?php 
                    echo $_SESSION['nombre']." - ";			        			 
                ?>
                <a class="enlace" href="../Vistas/desconectar.php"><?php echo "Desconectar";?></a>
            </div>
            <div class="row circulos">
                <div class="col-md-2 col-md-offset-2">
                    <a href="../Vistas/humeAire.php" class="condiciones">
                        <img src="../Imagenes/HAire.png" alt="..." class="imagen img-circle">
                        <label >                            
                                    Hum. Aire<br>
                                    <?php echo $c["humedadAire"]." %"; ?> 
                        </label>
                    </a>

                </div>
                <div class="col-md-2 col-md-offset-1">
                    <a href="../Vistas/humeTierra.php" class="condiciones">
                        <img src="../Imagenes/HTierra.png" alt="..." class="imagen img-circle">
                        <label >                            
                                Hum. Tierra<br>
                                <?php echo $c["humedadTierra"]." %"; ?> 
                        </label>
                    </a>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <a href="../Vistas/temperatura.php" class="condiciones">
                        <img src="../Imagenes/Temperatura.png" alt="..." class="imagen img-circle">
                        <label >                            
                                    Temperatura<br>
                                    <?php echo $c["temperatura"]." ºC"; ?> 
                        </label>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <a href="../Vistas/iluminacion.php" class="condiciones">
                        <img src="../Imagenes/Iluminacion.png" alt="..." class="imagen img-circle"><br>
                        <label >                            
                                    Iluminacion<br>
                                    <?php 
                                        if($c["iluminacion"]== 0)
                                            echo OFF;
                                        else
                                            echo ON;
                                    ?> 
                        </label>
                    </a>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <a href="../Vistas/ventilacion.php" class="condiciones">
                        <img src="../Imagenes/Ventilacion.png" alt="..." class="imagen img-circle">
                        <label >                            
                                    Ventilación(I/O)<br>
                                    <?php 
                                        if($c["venIntractor"]== 0){
                                            if($c["venExtractor"]== 0)
                                                echo "OFF/OFF";
                                            else
                                                echo "OFF/ON";
                                        }
                                        else{
                                            if($c["venExtractor"]== 0)
                                                echo "ON/OFF";
                                            else
                                                echo "ON/ON";
                                        }
                                    ?>
                        </label>
                    </a>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <a href="../Vistas/riego.php" class="condiciones">
                         <img src="../Imagenes/Riego.png" alt="..." class="imagen img-circle">
                        <label >
                            
                                    Riego<br>
                                    <?php 
                                        if($c["riego"]== 0)
                                            echo OFF;
                                        else
                                            echo ON;
                                    ?> 
                        </label>
                    </a>
                </div>
            </div>
        </div>    
    <?php
}
}

?>