<?php

require_once "../../funciones/auto_log.php";
$data_Post = $_POST;

$file_data = $_FILES['img'];
$id= $_GET['id'] ?? FALSE;

try {


    $instrumento = (new Guitarra)->instrumento_x_id($id);

    if(!empty($file_data['tmp_name'])){

        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/instrumentos",$file_data);

        (new Imagen())->borrarImagen(__DIR__ . "/../../img/instrumentos/" . $data_Post['img_original']);

      

    }else{

        $imagen= $data_Post['img_original'];
      
    }

    $instrumento->edit(
        $data_Post['marca'], 
        $data_Post['nombre'],
        $data_Post['modelo'],
        $data_Post['serie'],
        $data_Post['id_caracteristica'],
        $data_Post['color'],
        $data_Post['precio'],
        $imagen);
        (new Alert())->add_alerta('success', "Edición de instrumento completada.");

        header('Location: ../index.php?sec=admin_instrumento');

    } catch (Exception $e) {
        
        
        (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
        header('Location: ../index.php?sec=admin_instrumento');

    } 

?>