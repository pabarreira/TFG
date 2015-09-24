<?php
//Clase: lamparasClass.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class lampara
{
	//atributo idLampara : Identificador de lampara
	var $idLampara;
	//atributo estado : Guarda el estado de la lampara Encendido/Apagado
	var $estado;
	//atributos que almecenan la hora de inicio y de duracion de encendido de las lamparas
	var $inicio;
	var $duracion;

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
    
     function getIdLampara()
    {
        return $this["idLampara"];
    }
    
    function setIdLampara($idLampara)
    {
        $this["idLampara"]=$idLampara;
    }
    
    function getEstado()
    {
        return $this["estado"];
    }
    
    function setEstado($estado)
    {
         $this["estado"]=$estado;
    }
    
    function getInicio()
    {
        return  $this["inicio"];
    }
    
    function setInicio($inicio)
    {
         $this["inicio"]=$inicio;
    }
    
    function getDuracion()
    {
        return $this["duracion"];
    }
    
    function setDuracion($duracion)
    {
        $this["duracion"]=$duracion;
    }
   
    function getLampara()
    {
        $lamparas= array();
        $this->ConectarBD();
		$sql = "SELECT * FROM Lamparas";		
		$resul = mysql_query($sql);        
        if (mysql_num_rows($resul) != 0){ 
            echo mysql_num_rows($resul);
			while($row = mysql_fetch_array($resul)) 
            { 
                echo "sss";
                $idLampara=$row['idLampara'];
                $estado=$row['estado'];
                $inicio=$row['inicio'];
                $duracion=$row['duracion'];
                $lamparas[] = array('idLampara'=> $idLampara, 'estado'=> $estado, 'inicio'=> $inicio, 'duracion'=> $duracion);

            }	
            
             return $lamparas;
        }else{
           	echo "No hay lamparas!";
        }  
       
    }
    

}
?>