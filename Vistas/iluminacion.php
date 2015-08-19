<?php
//Fichero: iluminacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

include "../Modelos/lamparasClass.php";
include "../Vistas/cabecera.php";
$lamparas=new lampara();

?>
<form class="Formulario "action="../Controladores/procesar.php" method="post">			
	<table class="TFormulario" align="center" border="1">
		<tr>
			<td>Lampara</td>
			<td>Inicio</td>
			<td>Duracion</td>
			<td>Enc/Apg</td>
		</tr>
            	<?php $lamparas->obtenerLamparas();?>
        	<tr>
			<td colspan="2" align="center"><input type="submit" class="btn" name="accion" value="Mod Lamp"></td>
			<td colspan="2" align="center"><input type="submit" class="btn" name="accion" value="Volver"></td>
		</tr>
	</table>

</form>
<?php 
	include "../Vistas/pie.php";
?>