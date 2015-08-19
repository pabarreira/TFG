<?php
//fichero : autenticar.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------

//incluimos la clase usuarios
include "../Modelos/usuariosClass.php";

//recuperamos el valor de la variable accion
$accion = $_REQUEST['accion'];

// si viene de la accion de loguearse entramos aqui
if ($accion=="Validar")
{
	$usuario= new Usuario();
	$usuario->login=$_REQUEST['login'];
	$usuario->password=$_REQUEST['pass'];
	$usuario->validarUsuario();
}
?> 
