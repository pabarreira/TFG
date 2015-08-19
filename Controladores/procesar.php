<?php
//Fichero: procesar.php
//Creado por: ABP14/10
//-------------------------------------------------------

$accion = $_REQUEST['accion'];
	switch ($accion) {
		case "Volver":
			header("location:../Vistas/menu.php");
		break;
		case "Mod Lamp":
			include "../Vistas/iluminacion.php";	
			$ini=$_POST["inicio"];
			$dur=$_POST["duracion"];			
			$lamparas->cambiarHoraProgramada($ini, $dur, count($dur));
		break;
		case "Mod Vent":
			include "../Vistas/ventilacion.php";
			$potencia=$_POST["potencia"];
			$ventiladores->cambiarPotencia($potencia);
		break;
		case "Mod Riego":			
			include "../Vistas/riego.php";
			$max=$_POST["humMaxima"];
			$min=$_POST["humMinima"];			
			$riego->cambiarHumedades($max, $min, count($max));
		break;
	}
?>
