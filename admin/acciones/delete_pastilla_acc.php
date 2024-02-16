<?php
require_once "../../funciones/auto_log.php";

$id= $_GET['id'] ?? FALSE;

try {

    $pastilla = (new Pastillas)->get_x_id($id);

    

    $pastilla->delete();
    (new Alert())->add_alerta('success', "Eliminación de pastilla completada.");
    header('Location: ../index.php?sec=admin_pastilla');
    
    } catch (Exception $e) {
        
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
        (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
        header('Location: ../index.php?sec=admin_pastilla');
    } 


?>