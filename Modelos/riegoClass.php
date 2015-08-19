<?php
//Clase: ventiladoresClass.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class riego
{
	//atributo idLampara : Identificador de reigo
	var $idRiego;
	//atributo estado : Guarda nombre del riego
	var $nombre;
	//atributos que almecenan estado actual del riego Encendido/Apagado
	var $estado;
	//actributos que contienen los valores actuales de humedad y los definidos por el usuarior maxima o minima
	var $humedadActual;
	var $humedadMinima;
	var $humedadMaxima;
	//atributo que contiene el nivel de agua en el deposito
	var $nivel;

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

	function obtenerRiego()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM Riego";		
		$resul = mysql_query($sql);
		if (mysql_num_rows($resul) != 0){
			$w=0;
			while($res = mysql_fetch_array($resul)){
				echo "<tr><td>".$res["nombre"]."</td><td>".$res["humedadActual"]."</td><td><select name=humMinima[]>";
                for ($i = 0; $i <= 100; $i++) {
					if ($res["humedadMinima"]== $i)
						echo "<option selected value=\"".$i."\">".$i."</option>";
					else
						echo "<option value=\"".$i."\">".$i."</option>";
                }
                echo "</select></td><td><select name=humMaxima[]>";
                for ($i = 0; $i <= 100; $i++) {
					if ($res["humedadMaxima"]== $i)
						echo "<option selected value=\"".$i."\">".$i."</option>";
					else
						echo "<option value=\"".$i."\">".$i."</option>";
                }
                echo "<td>".$res["nivel"]."</td>";
                if ($res["estado"]=="1")
					echo "</select></td><td><input type=checkbox name=check[] value=".$w." checked disabled></td></tr>";
				else
					echo "</select></td><td><input type=checkbox name=check[] value=".$w." disabled></td></tr>";
				$w++;
			}
		}
	}

	function cambiarHumedades($maxima, $minima, $numRiego)
	{
		$this->ConectarBD();		
		for ($i = 0; $i < $numRiego; $i++){
			$sql="UPDATE Riego SET humedadMaxima =  '".$maxima[$i]."', humedadMinima = '".$minima[$i]."' WHERE idRiego = '".$i."'";
			echo $sql;		
			mysql_query($sql);
		}
	}
}
?>