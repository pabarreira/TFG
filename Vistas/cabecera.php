<?php
//Fichero : cabecera
//Creado por: ABP14/10
//-------------------------------------------------------

//comprobación si session esta logueada
session_start();
if (!(isset($_SESSION['user'])))
    header("location:../Vistas/login.php");
include "../Controladores/funcionalidades.php";

?>
<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" media="screen" />
<body>
<table class="TPrincipal" align="center">

<tr class="Encabezado">
	<td colspan = 2>
		<table class="TCabecera">
		<tr>
    			<td>

				<?php 
			                echo "Usuario: ".$_SESSION['login'];			        			 
				?>
				</td>
				<td>	
				<a class="enlace" href="../Vistas/desconectar.php"><?php echo "Desconectar";?></a>

    			</td>

		</tr>
		<tr>
    			<th colspan="2" class="Titulo"><div class=""></div></th>					
		</tr>
		</table>
	</td>
</tr>



<tr>
    <td class="Menu" align="center">
	<?php 
	        MenuUsuario();
	?>    
    </td>
</tr>
    <td> 
 
