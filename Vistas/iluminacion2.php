<?php
//Fichero: iluminacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

//require_once("../Modelos/lampara.php");
require_once("../Controladores/controladorLampara.php");
include "../Vistas/portada.php";
$lamp=new lampara;
?>

<div  class = "container">       
    <div class="col-md-8 col-md-offset-2 ">
        <form class="iluminacion">
            <div  class = "panel panel-primary">     
                <div class="cabecera row">
                        <div class="col-md-3">
                            Codigo
                        </div>
                        <div class="col-md-3" >
                            inicio
                        </div>
                        <div class="col-md-3">
                            duracion
                        </div>
                        <div class="col-md-3" >
                            On/Off
                        </div>
                    </div>
                        <?php //obtenerLamparas($lamp);?>
                    <tr>
                    <td colspan="2" align="center"><input type="submit" class="btn" name="accion" value="Mod Lamp"></td>
                    <td colspan="2" align="center"><input type="submit" class="btn" name="accion" value="Volver"></td>
                </tr>
            </div>
         </form>
    </div>
</div>