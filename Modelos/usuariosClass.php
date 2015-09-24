<?php
//Clase: usuarioClass.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------

class Usuario
{
	//atributo user : guarda el nombre de usuario para iniciar sesion
	var $idUsuario;
	//atributo password : guarda la contraseña para iniciar sesion
	var $nombre;
	//atributo id : guarda el id del usuario
	var $apellidos;
	//atributo rol : guarda el rol del usuario
	var $login;
	//atributo tel : guarda el telefono del usuario
	var $password;

	//Constructor de la clase
	function __construct()
	{
		//Constructor vacio
	}
	//Metodo (invocable estático) que conecta con la BD y la tabla Usuarios
	function ConectarBD()
	{
		mysql_connect("localhost","userInv","passdb") or die("no conecta con mysql");
		mysql_select_db("invernaderoDB") or die("No conecta con la db");
	}

	//funcion de destrucción del objeto: se ejecuta automaticamente
	//al finalizar el script
	function __destruct()
	{}

	function validarUsuario()
	{
		//Conectamos con la BD
		$this->ConectarBD();
		//comprobamos si existe en la bd
		$sql = "select * from Usuarios where `login` = '".$this->login."' AND `password` = '".$this->password."'";
		$resul = mysql_query($sql);
		if (mysql_num_rows($resul) == 1)
		{
			// si existe en la bd comprobamos si coincide la pass
			$res = mysql_fetch_array($resul);
			// si la pass coincide registramos en la session el login
			// y el tipo de usuario que recogemos de la bd
			// y lo enviamos a la pagina de Menu
			if ($this->password==$res['password'])
				session_start();
			$_SESSION['nombre']=$res['nombre'];
			header("location:../Vistas/portada.php");
		}
		//si no existe el login en la bd lo mandamos a loguearse
		else
		{
            echo $sql;
			echo "No existe el usuario \n";
			echo "<a href='../Vistas/login.php'>Volver al Login</a>";
		}

	}
		
}
?>
