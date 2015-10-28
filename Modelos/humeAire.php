<?php
//Clase: horario.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class humedad
{
	//atributo idHorario : Identificador de horario
	var $idHumedad;
	//atributo estado : Guarda el estado de la horario Encendido/Apagado
	var $maxima;
	//atributos que almecenan la potencia a la que se encuentra el 
	var $minima;
    //atributos que almecenan la hora de inicio del horario
	var $deseada;
    var $actual;

	//Constructor de la clase
	function __construct()
	{
		//Constructor vacio
	}
	//Metodo (invocable estático) que conecta con la BD y la tabla Ventiladores
	function ConectarBD()
	{
		mysql_connect("localhost","userInv","passdb") or die("no conecta con mysql");
		mysql_select_db("invernaderoDB") or die("No conecta con la db");
	}


	function __destruct()
	{}        
   
    function getHumedades()
    {
      $this->ConectarBD();
		$sql = "SELECT * FROM HumeAire";
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
			while($row = mysql_fetch_array($resul)) 
            { 
                $idHumedad=$row['idHumedad'];
                $maxima=$row['maxima'];
                $minima=$row['minima'];
                $deseada=$row['deseada'];
                $actual=$row['actual'];  
                $humedades[] = array('idHumedad'=> $idHumedad, 'maxima'=> $maxima, 'minima'=> $minima, 'deseada'=> $deseada, 'actual'=> $actual);

            }	
             return $humedades;
        }else{
           	echo "No hay Humedades!";
        }  
       
    }
    
    function cambiarHumedades($hum){
        $this->ConectarBD();
        $sql= "UPDATE  `invernaderoDB`.`HumeAire` SET  `minima` =  '".$hum->minima."', `maxima` =  '".$hum->maxima."', `deseada` =  '".$hum->deseada."' WHERE  `HumeAire`.`idHumedad` ='".$hum->idHumedad."'";
        mysql_query($sql);
    }
    
    
         
}
?>