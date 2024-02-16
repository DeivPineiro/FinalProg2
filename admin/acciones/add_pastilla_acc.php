<?php

require_once "../../funciones/auto_log.php";

$data_Post = $_POST;



try {



    (new Pastillas())->insert(
        $data_Post['marca'], 
        $data_Post['modelo'],
        $data_Post['color'],
        $data_Post['posicion']         
    );
    (new Alert())->add_alerta('success', "Carga de instrumento completada.");
 header('Location: ../index.php?sec=admin_pastilla');

} catch (Exception $e) {
    echo "<pre>";
    echo print_r($e);
    echo "</pre>";
    (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
    header('Location: ../index.php?sec=admin_pastilla');
}

