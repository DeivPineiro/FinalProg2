<?php



require_once "../../funciones/auto_log.php";
$data_Post = $_POST;


$id= $_GET['id'] ?? FALSE;   
    
try {

    $caracteristica = (new Pastillas)->get_x_id($id);
   
    $caracteristica->edit(
        $data_Post['marca'], 
        $data_Post['modelo'],
        $data_Post['color'],
        $data_Post['posicion']);
        (new Alert())->add_alerta('success', "Edición de pastilla completada.");
        header('Location: ../index.php?sec=admin_pastilla');

    } catch (Exception $e) {
        
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
        (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
        header('Location: ../index.php?sec=admin_pastilla');

    } 
