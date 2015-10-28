<?php
//Clase: horario.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class temperatura
{
	//atributo idHorario : Identificador de horario
	var $idTemperatura;
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
   
    function getTemperaturas()
    {
      $this->ConectarBD();
		$sql = "SELECT * FROM Temperatura";
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
			while($row = mysql_fetch_array($resul)) 
            { 
                $idTemperatura=$row['idTemperatura'];
                $maxima=$row['maxima'];
                $minima=$row['minima'];
                $deseada=$row['deseada'];
                $actual=$row['actual'];  
                $temperaturas[] = array('idTemperatura'=> $idTemperatura, 'maxima'=> $maxima, 'minima'=> $minima, 'deseada'=> $deseada, 'actual'=> $actual);

            }	
             return $temperaturas;
        }else{
           	echo "No hay Ventiladores!";
        }  
       
    }
    
    function cambiarTemperatura($tem){
        $this->ConectarBD();
        $sql= "UPDATE  `invernaderoDB`.`Temperatura` SET  `minima` =  '".$tem->minima."', `maxima` =  '".$tem->maxima."', `deseada` =  '".$tem->deseada."' WHERE  `Temperatura`.`idTemperatura` ='".$tem->idTemperatura."'";
        mysql_query($sql);
    }
    
    
         
}
?>