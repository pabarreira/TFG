<?php
//fichero : desconectar
//creado por: Pablo Alonso Barreira
//--------------------------------------------


// reiniciamos la session
session_start();
// destruimos la session
session_destroy();
// enviamos a la pagina de login
header("location:login.php");
?>
