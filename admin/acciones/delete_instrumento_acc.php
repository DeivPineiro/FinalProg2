<?php
require_once "../../funciones/auto_log.php";

$id= $_GET['id'] ?? FALSE;



try {
  

    $instrumento = (new Guitarra)->instrumento_x_id($id);   
    (new Imagen())->borrarImagen(__DIR__ . "/../../img/instrumentos/" . $instrumento->getImg());
    $instrumento->delete();
    (new Alert())->add_alerta('success', "Eliminación de instrumento completada.");
    header('Location: ../index.php?sec=admin_instrumento');
    
    } catch (Exception $e) {
        
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
        (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
        header('Location: ../index.php?sec=admin_instrumento');

    } 


?>