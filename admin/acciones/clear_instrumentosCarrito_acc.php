<?PHP
require_once "../../funciones/auto_log.php";




    (new Carrito())->clear_instrumentos($id);
    (new Alert())->add_alerta('warning', "Se vacio el Carrito");
    header('location: ../../index.php');
