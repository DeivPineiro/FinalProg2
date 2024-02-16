<?php
session_start();
function autologClases($nombreClase){


$archivoClase = __DIR__ . "/../classes/$nombreClase.php";

if(file_exists(($archivoClase))){

    require_once $archivoClase;

}else{

    die("No se pudo cargar clase : $archivoClase");

}



}

spl_autoload_register('autologClases');


?>