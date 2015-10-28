<?php
//Clase: horario.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class condicion
{
	//atributo idHorario : Identificador de horario
	var $idCondicion;
	//atributo estado : Guarda el estado de la horario Encendido/Apagado
	var $humedadTierra;
	//atributos que almecenan la potencia a la que se encuentra el 
	var $humedadAire;
    //atributos que almecenan la hora de inicio del horario
	var $riego;
    var $iluminacion;
    var $venIntractor;
    var $venExtractor;
    var $temperatura;

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
   
    function getCondiciones()
    {
      $this->ConectarBD();
		$sql = "SELECT * FROM Condiciones";
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
			while($row = mysql_fetch_array($resul)) 
            { 
                $idCondicion=$row['idCondicion'];
                $humedadTierra=$row['humedadTierra'];
                $humedadAire=$row['humedadAire'];
                $reigo=$row['riego'];
                $iluminacion=$row['iluminacion'];
                $venIntractor=$row['venIntractor'];
                $venExtractor=$row['venExtractor'];
                $temperatura=$row['temperatura'];
                $condiciones[] = array('idCondicion'=> $idCondicion, 'humedadTierra'=> $humedadTierra, 'humedadAire'=> $humedadAire, 'riego'=> $reigo, 'iluminacion'=> $iluminacion, 'venIntractor'=> $venIntractor, 'venExtractor'=> $venExtractor, 'temperatura'=> $temperatura);

            }	
             return $condiciones;
        }else{
           	echo "No hay Condiciones!";
        }  
       
    }
         
}
?>