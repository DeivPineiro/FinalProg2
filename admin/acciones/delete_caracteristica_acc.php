<?php
require_once "../../funciones/auto_log.php";

$id= $_GET['id'] ?? FALSE;

try {

    

    $caracteristica = (new Caracteristicas)->get_x_id($id);
    $caracteristica->clear_pastilla();
    
    (new Alert())->add_alerta('success', "Eliminación de caracteristica completada.");
    $caracteristica->delete();
    
    header('Location: ../index.php?sec=admin_caracteristica');
    
    } catch (Exception $e) {
        
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";

        (new Alert())->add_alerta('danger', "Oh no, error => ". $e );
        header('Location: ../index.php?sec=admin_caracteristica');
    } 


?>