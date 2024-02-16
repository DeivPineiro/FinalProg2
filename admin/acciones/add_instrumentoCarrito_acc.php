<?php

require_once "../../funciones/auto_log.php";

$id = $_GET['id'] ?? FALSE;
$cant = $_GET['cantidad'] ?? 1;




if($id)
{
    
(new Carrito())->agregarInstrumento($id,$cant);
(new Alert())->add_alerta('success', "Nuevo instrumento en tu carrito ;-) .");
header('location: ../../index.php?sec=carrito');
    

}


?>