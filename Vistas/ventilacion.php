<?php
//Fichero: ventilacion.php
//Creado por: ABP14/10
//-------------------------------------------------------

include "../Modelos/ventiladoresClass.php";
include "../Vistas/cabecera.php";
$ventiladores=new ventilador();

?>
<form class="Formulario "action="../Controladores/procesar.php" method="post">			
	<table class="TFormulario" align="center" border="1">
		<tr>
			<td>Ventilador</td>
			<td>Potencia%</td>
			<td>Enc/Apg</td>
		</tr>
            	<?php $ventiladores->obtenerVentiladores();?>
        	<tr>
			<td colspan="1" align="center"><input type="submit" class="btn" name="accion" value="Mod Vent"></td>
			<td colspan="2" align="center"><input type="submit" class="btn" name="accion" value="Volver"></td>
		</tr>
	</table>

</form>
<?php 
	include "../Vistas/pie.php";
?>