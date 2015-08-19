<?php
//Fichero: riego.php
//Creado por: ABP14/10
//-------------------------------------------------------

include "../Modelos/riegoClass.php";
include "../Vistas/cabecera.php";
$riego=new riego();

?>
<form class="Formulario "action="../Controladores/procesar.php" method="post">			
	<table class="TFormulario" align="center" border="1">
		<tr>
			<td>Riego</td>
			<td>Humedad actual</td>
			<td>Humedad minima</td>
			<td>Humedad maxima</td>
			<td>Nivel de agua</td>
			<td>Enc/Apg</td>
		</tr>
            	<?php $riego->obtenerRiego();?>
        <tr>
			<td colspan="3" align="center"><input type="submit" class="btn" name="accion" value="Mod Riego"></td>
			<td colspan="3" align="center"><input type="submit" class="btn" name="accion" value="Volver"></td>
		</tr>
	</table>

</form>
<?php 
	include "../Vistas/pie.php";
?>