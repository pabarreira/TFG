<?php
//Clase: ventiladoresClass.php
//Creado por: //creado por: Pablo Alonso Barreira
//--------------------------------------------
 
class ventilador
{
	//atributo idLampara : Identificador de lampara
	var $idVentilador;
	//atributo estado : Guarda el estado del ventilador Encendido/Apagado
	var $estado;
	//atributos que almecenan la hora de inicio y de fin de encendido de los ventiladores
	var $inicio;
	var $fin;
	//Atributo que establece la potencia a la que funciona el ventilador
	var $potencia;

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

	function obtenerVentiladores()
	{
		$this->ConectarBD();
		$sql = "SELECT * FROM Ventiladores";		
		$resul = mysql_query($sql);
		if (mysql_num_rows($resul) != 0){
			$w=0;
			while($res = mysql_fetch_array($resul)){
				echo "<tr><td>".$res["nombre"]."</td><td><select name=potencia[]>";
                for ($i = 0; $i <= 100; $i = $i + 10) {
					if ($res["potencia"]== $i)
						echo "<option selected value=\"".$i."\">".$i."</option>";
					else
						echo "<option value=\"".$i."\">".$i."</option>";					
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

	function cambiarPotencia($potencia)
	{    	
	    $this->ConectarBD();
		for ($i = 0; $i < count($potencia); $i++){
			$sql="UPDATE Ventiladores SET potencia =  '".$potencia[$i]."' WHERE idVentilador = '".$i."'";		
			mysql_query($sql);
		}
	}
}
?>