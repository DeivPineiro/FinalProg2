<?PHP
require_once "../../funciones/auto_log.php";

$id = $_GET['id'] ?? FALSE;

if($id){
    (new Carrito())->remove_instrumento($id);
    (new Alert())->add_alerta('success', "Se elemino correctamente del carrito.");
    header('location: ../../index.php?sec=carrito');
}