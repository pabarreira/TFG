#!/usr/local/bin/php -q
<?php 	
	$nombre_archivo = "logs.txt"; 
	if(file_exists($nombre_archivo))
		$mensaje = "El Archivo $nombre_archivo se ha modificado";
	else
		$mensaje = "El Archivo $nombre_archivo se ha creado";
	if($archivo = fopen($nombre_archivo, "a"))
	{
		if(fwrite($archivo, date("d m Y H:m:s"). " ". $mensaje. "\n"))
		{
			
		}
		else
		{
			
		}

		fclose($archivo);
	}

 ?>