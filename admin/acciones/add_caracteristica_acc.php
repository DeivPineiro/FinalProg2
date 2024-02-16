<?php

require_once "../../funciones/auto_log.php";

$data_Post = $_POST;



try {

    $caracteristica = new Caracteristicas();



    $idCaracteristica = $caracteristica->insert(
        $data_Post['m_Mastil'], 
        $data_Post['m_Cuerpos'],
        $data_Post['n_Clavijas'],
        $data_Post['n_Trastes'],       
        $data_Post['t_Mastil']
    );

    if (isset($data_Post['pastillas'])) {
        foreach ($data_Post['pastillas'] as $pastilla_id) {
            $caracteristica->add_pastillas(intval($idCaracteristica), $pastilla_id);
        }
    }

    (new Alert())->add_alerta('success', "Carga de caracteristica completada.");
    header('Location: ../index.php?sec=admin_caracteristica');

} catch (Exception $e) {
    echo "<pre>";
    echo print_r($e);
    echo "</pre>";
    (new Alert())->add_alerta('danger', "Oh no, error => ". $e);
    header('Location: ../index.php?sec=admin_caracteristica');
}

