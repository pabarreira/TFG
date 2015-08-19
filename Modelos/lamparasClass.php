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

	function obtenerLamparas()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM Lamparas";		
		$resul = mysql_query($sql);
		if (mysql_num_rows($resul) != 0){
			$w=0;
			while($res = mysql_fetch_array($resul)){				
				echo "<tr><td>".$res["idLampara"]."</td><td><select name=inicio[]>"; 
				for ($i = 0; $i <= 23; $i++) {
					for ($j = 0; $j < 60; $j = $j + 30) {
						$i = str_pad($i, 2, "0", STR_PAD_LEFT);
					        $j = str_pad($j, 2, "0", STR_PAD_LEFT);
						if ($res["inicio"]== $i.":".$j)
							echo "<option selected value=\"".$i.":".$j."\">".$i.":".$j."</option>";
						else
							echo "<option value=\"".$i.":".$j."\">".$i.":".$j."</option>";
					}
                }
				echo "</select></td><td><select name=duracion[]>"; 
				for ($i = 0; $i <= 23; $i++) {
					for ($j = 0; $j < 10; $j = $j + 5) {
						if ($res["duracion"]== $i.",".$j)
							echo "<option selected value=\"".$i.",".$j."\">".$i.",".$j."</option>";
						else
							echo "<option value=\"".$i.",".$j."\">".$i.",".$j."</option>";
					}
                }
				if ($res["estado"]=="1")
					echo "</select></td><td><input type=checkbox name=check[] value=".$w." checked disabled></td></tr>";
				else
					echo "</select></td><td><input type=checkbox name=check[] value=".$w." disabled></td></tr>";
				$w++;
            }
        }else{
           	echo "<tr><td colspan=3 >No hay lamparas!</tr></td>";
        }
	}

	function obtenerHorarios()
	{
		$this->ConectarBD();
		//$lamparas= array();
		$sql = "SELECT * FROM Lamparas";		
		$resul = mysql_query($sql);
		if (mysql_num_rows($resul) != 0){
			$w=0;			
			while($res = mysql_fetch_array($resul)){
				$lamparas[$w]->idLampara=$res["idLampara"];
				$lamparas[$w]->estado=$res["estado"];
				$lamparas[$w]->inicio=$res["inicio"];
				$lamparas[$w]->duracion=$res["duracion"];
				$w++;
			}			
		}
		return $lamparas;
	}

	function cambiarHoraProgramada($inicio, $duracion, $numLamp)
	{    	
	    $this->ConectarBD();
	    //Actualizamos los cambios en la base de datos
		for ($i = 0; $i < $numLamp; $i++){
			$sql="UPDATE Lamparas SET inicio =  '".$inicio[$i]."', duracion = '".$duracion[$i]."' WHERE idLampara = '".$i."'";			
			mysql_query($sql);
		}
	}

	function cambiarEstado($encendidos, $apagados)
	{    	
	    $this->ConectarBD();
	    $file = fopen("../Logs/estadosLamparas.txt", "a");
	    $enc=1;
	    $apa=0;
	    //Actualizamos los cambios en la base de datos
		for ($i = 0; $i < count($encendidos); $i++){
			$sql="UPDATE Lamparas SET estado = '".$enc."' WHERE idLampara = '".$encendidos[$i]->idLampara."'";	
			$msg="Comprobacion de lampara =  '".$encendidos[$i]->idLampara."' -->  ENCENDIDA";	
			mysql_query($sql);
			fwrite($file, sprintf(date("g:i a, j F, Y")."\t--\t".$msg) . PHP_EOL);
		}
		for ($i = 0; $i < count($apagados); $i++){
			$sql="UPDATE Lamparas SET estado = '".$apa."' WHERE idLampara = '".$apagados[$i]->idLampara."'";
			$msg="Comprobacion de lampara =  '".$apagados[$i]->idLampara."' -->  APAGADA";
			mysql_query($sql);
			fwrite($file, sprintf(date("g:i a, j F, Y")."\t--\t".$msg) . PHP_EOL);
		}
		fclose($file);	
	}
}
?>