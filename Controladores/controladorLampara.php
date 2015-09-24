<?php
//fichero : controladorLampara.php
//creado por: Pablo Alonso Barreira
//--------------------------------------------
require_once("../Modelos/lampara.php");


function obtenerLamparas($lamp)
{
    echo "sss";
    $lamp=$lamp->getLampara();
    $i=0;
    echo $lamp[0];
//    while($lamp){
//        echo $lamp;
//        $i++;
//    }
   
}