<?php

require_once "../../funciones/auto_log.php";

$data_Post = $_POST;
$data_File = $_FILES['imagen'];


try {


    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/instrumentos", $data_File);

    (new Guitarra())->insert(
        $data_Post['marca'], 
        $data_Post['nombre'], 
        $data_Post['modelo'], 
        $data_Post['serie'], 
        $data_Post['id_caracteristica'], 
        $data_Post['color'], 
        $imagen, 
        $data_Post['precio']
    );
    (new Alert())->add_alerta('success', "Carga de instrumento completada.");
    header('Location: ../index.php?sec=admin_instrumento');

} catch (Exception $e) {
    
    (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
    header('Location: ../index.php?sec=admin_instrumento');
}
