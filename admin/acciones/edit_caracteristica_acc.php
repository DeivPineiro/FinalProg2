<?php

require_once "../../funciones/auto_log.php";
$data_Post = $_POST;
$id= $_GET['id'] ?? FALSE;

      

try {


    $caracteristica = (new Caracteristicas)->get_x_id($id);

    $caracteristica->clear_pastilla();

    if (isset($data_Post['pastillas'])) {
        foreach ($data_Post['pastillas'] as $pastilla_id) {
            $caracteristica->add_pastillas(intval($id), $pastilla_id);
        }
    }

    $caracteristica->edit(
        $data_Post['m_Mastil'], 
        $data_Post['m_Cuerpos'],
        $data_Post['n_Clavijas'],
        $data_Post['n_Trastes'],      
        $data_Post['t_Mastil']);
        (new Alert())->add_alerta('success', "Edición de caracteristica completada.");
        header('Location: ../index.php?sec=admin_caracteristica');

    } catch (Exception $e) {
        
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
        (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
        header('Location: ../index.php?sec=admin_caracteristica');

    } 
