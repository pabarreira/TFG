<?php
//Clase: horario.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class horario
{
	//atributo idHorario : Identificador de horario
	var $idHorario;
	//atributo estado : Guarda el estado de la horario Encendido/Apagado
	var $estado;
	//atributos que almecenan la hora de inicio del horario
	var $inicio;
    //atributos que almecenan la hora de inicio del horario
	var $fin;
    //atributos que almecenan un nombre recordatorio del horario
    var $recordatorio;
    //atributos que almecenan el tipo de horario Lamp/Rieg
    var $tipo;

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
   
    function getHorarios($opc)
    {
        //$horarios = array();
      $this->ConectarBD();
        if ($opc!="")
		  $sql = "SELECT * FROM HorLampRieg WHERE `tipo`= '".$opc."'";
        else
            $sql = "SELECT * FROM HorLampRieg";
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
			while($row = mysql_fetch_array($resul)) 
            { 
                $idHorario=$row['idHorario'];
                $estado=$row['estado'];
                $inicio=$row['inicio'];
                $fin=$row['fin'];
                $recordatorio=$row['recordatorio'];
                $tipo=$row['tipo'];
                $horarios[] = array('idHorario'=> $idHorario, 'estado'=> $estado, 'inicio'=> $inicio, 'fin'=> $fin, 'recordatorio'=>$recordatorio, 'tipo'=> $tipo);

            }	
             return $horarios;
        }else{
           	echo "No hay Horarios";
        }  
       
    }
    
    function añadirHorario($hor){
        $this->ConectarBD();
        $sql = "INSERT INTO `invernaderoDB`.`HorLampRieg` (`idHorario`, `estado`, `inicio`, `fin`, `recordatorio`, `tipo`) VALUES (NULL, '0', '".$hor->inicio."', '".$hor->fin."', '".$hor->recordatorio."', '".$hor->tipo."');";
        mysql_query($sql);
    }
    
    
    function activar($act){
       $this->ConectarBD();
        $sql ="UPDATE  `invernaderoDB`.`HorLampRieg` SET  `estado` =  '1' WHERE  `HorLampRieg`.`idHorario` ='".$act['idHorario']."';";
        mysql_query($sql);           
    }
    
    function desactivar($des){
       $this->ConectarBD();
        $sql ="UPDATE  `invernaderoDB`.`HorLampRieg` SET  `estado` =  '0' WHERE  `HorLampRieg`.`idHorario` ='".$des['idHorario']."';";
        mysql_query($sql);           
    }
    
    function borrar($hor){
       $this->ConectarBD();
        foreach($hor as $h){
            $sql ="DELETE FROM `invernaderoDB`.`HorLampRieg` WHERE `HorLampRieg`.`idHorario` = '".$h['idHorario']."'";
            mysql_query($sql);           
        }
    }
         
}
?>