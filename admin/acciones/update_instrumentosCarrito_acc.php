<?PHP
require_once "../../funciones/auto_log.php";

$dataPost = $_POST;


if(!empty($dataPost)){
    (new Carrito())->modificar_cantidad($dataPost['q']);
    (new Alert())->add_alerta('success', "Se acrualizo correctamente las cantidades.");
    header('location: ../../index.php?sec=carrito');
}