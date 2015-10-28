<?php
//Clase: horario.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class ventilador
{
	//atributo idHorario : Identificador de horario
	var $idVentilador;
	//atributo estado : Guarda el estado de la horario Encendido/Apagado
	var $estado;
	//atributos que almecenan la potencia a la que se encuentra el 
	var $potencia;
    //atributos que almecenan la hora de inicio del horario
	var $nombre;

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

	//funcion de destrucción del objeto: se ejecuta automaticamente
	//al finalizar el script
	function __destruct()
	{}        
   
    function getVentiladores()
    {
        //$horarios = array();
      $this->ConectarBD();
		$sql = "SELECT * FROM Ventilacion";
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
			while($row = mysql_fetch_array($resul)) 
            { 
                $idVentilador=$row['idVentilador'];
                $estado=$row['estado'];
                $potencia=$row['potencia'];
                $nombre=$row['nombre'];                
                $ventiladores[] = array('idVentilador'=> $idVentilador, 'estado'=> $estado, 'potencia'=> $potencia, 'nombre'=> $nombre);

            }	
             return $ventiladores;
        }else{
           	echo "No hay Ventiladores!";
        }  
       
    }
    
    function activar($act){
       $this->ConectarBD();
        $sql ="UPDATE  `invernaderoDB`.`Ventilacion` SET  `estado` =  '1' WHERE  `Ventilacion`.`idVentilador` ='".$act['idVentilador']."';";
        mysql_query($sql);           
    }
    
    function desactivar($des){
       $this->ConectarBD();
        $sql ="UPDATE  `invernaderoDB`.`Ventilacion` SET  `estado` =  '0' WHERE  `Ventilacion`.`idVentilador` ='".$des['idVentilador']."';";
        mysql_query($sql);           
    }
    
    function cambiarPotencia($ven, $pot){
        $this->ConectarBD();
        $sql = "UPDATE  `invernaderoDB`.`Ventilacion` SET  `potencia` =  '".$pot."' WHERE  `Ventilacion`.`idVentilador` = '".$ven['idVentilador']."';";
        mysql_query($sql);
    }
         
}
?>