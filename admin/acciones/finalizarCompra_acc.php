<?PHP
require_once "../../funciones/auto_log.php";

$instrumentos = (new Carrito())->get_carrito();

try {

    $dataCompra = [

        "id_usuario" => 9,
        "fecha" => date("Y-m-d", time()),
        "importe" => (new Carrito())->total(),

    ];

    $detalle = [];

    foreach ($instrumentos as $key => $i) {

        $detalle[$key] = $i['cantidad'];
    }


    
    header('location: ../../index.php?sec=gracias');
    (new Carrito())->insert_compra($dataCompra, $detalle);
} catch (Exception $e) {

    (new Alert())->add_alerta('danger', "Oh no, error => " . $e);
    header('location: ../../index.php?sec=carrito');
}
