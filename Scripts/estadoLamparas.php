<?php  
//Clase: estadoLuces.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
include "../Modelos/lamparasClass.php";

$lampara = new lampara();
$encendidos = array();
$apagados = array();

$lamparas = $lampara->obtenerHorarios();

$hora = getdate();
$ahora = $hora['hours'].":".$hora['minutes'];

$enc=0;
$apa=0;

for ($i=0; $i<count($lamparas); $i++){
	$rangHoras=array();
	$rangMinus=array();
	$horIni = explode(":", $lamparas[$i]->inicio);
	$porFin = explode(",", $lamparas[$i]->duracion);
	$horFin[0] = $horIni[0] + $porFin[0];				//ajustamos la hora final=horas de inicio mas las horas de duración
	$horFin[1] = $horIni[1];							//ajustamos los minutos finalesigual al valor inicial.

	if($porFin[1]==5){									//Comprobamos las medias horas a añadir de duración si es 5 indica q es media hora mas
		if($horFin[1]==30){								//comprobamos el valor de la hora de inicio para ajustar el valor final
			$horFin[1] = "00";								//En este caso nos indica que tenemos que añadir una hora más las horas finales
			$horFin[0]++;								
		}else{
			$horFin[1]="30";
		}
	}
	if($horFin[0]>=24){									//comprobamos el valor de las horas para reiniciar el contador si se pasa de la hora 23
		$horFin[0] = $horFin[0]-24;
	}
	
	for($j=0; $j<24; $j++){								//Creamos una lista de 24 horas a partir de las horas de inicio
		if(($horIni[0]+$j)<=23){
			$rangHoras[$j]= $horIni[0]+$j;
		}else{
			$rangHoras[$j]= $horIni[0]+$j-24;
		}
	}
	for($j=0; $j<60; $j++){								//Creamos una lista de 60 minutos a partir de los minutos de inicio
		if(($horIni[1]+$j)<=59){
			$rangMinus[$j]= $horIni[1]+$j;
		}else{
			$rangMinus[$j]= $horIni[1]+$j-60;
		}
	}

	/*echo array_search($horIni[0], $rangHoras)."\n";
	echo array_search($hora['hours'], $rangHoras)."\n";
	echo array_search($horFin[0], $rangHoras)."\n";*/

	if(array_search($horFin[0], $rangHoras)>=array_search($hora['hours'], $rangHoras)){
		if(array_search($horFin[1], $rangMinus)>=array_search($hora['minutes'], $rangMinus)){
			$encendidos[$enc]=$lamparas[$i];
			$enc++;
		}else{
			$apagados[$apa]=$lamparas[$i];
			$apa++;
		}
	}
	else{
		$apagados[$apa]=$lamparas[$i];
		$apa++;
	}	
}
$lampara->cambiarEstado($encendidos, $apagados);

?>