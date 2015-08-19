<?php
//Fichero: login.php
//Creado por: Pablo Alonso Barreira
//------------------------------------------------------

//Formulario inicial de login
?>
<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" media="screen">
<body>
	<form action="../Controladores/autenticar.php" method="post">
	<table class="TLogin">
		<tr>
			<td>Usuario:</td>
			<td><input type="text" name="login"></td>
 		</tr>
 		<tr>
 			<td>Password:</td>
 			<td><input type="password" name="pass"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="accion" class="btn" value="Validar"></td>
			<td><input type="reset" name="accion" class="btn" value="Limpiar"></td>
		</tr>
	</table>
	</form>
</body>
