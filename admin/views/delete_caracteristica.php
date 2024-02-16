<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}

$id = $_GET['id'] ?? FALSE;
$caracteristica = (new Caracteristicas())->get_x_id($id);


?>

<div class="container col-lg-10 col-sm-12 my-5 ">
    <div class="card mb-3 bg-light rounded border border-warning p-3">

        <div class="card-body text-center">


            <h1 class="h5 text-center fw-bold"><strong><span lang="en">¿Esta seguro de borrar caracteristica con ID: <?= $caracteristica->getId_caracteristica() ?>?</span></strong></h1>
            <p>Con mastil de <strong><span lang="en"><?= $caracteristica->getM_Mastil() ?></span></strong>, con cuerpo de <strong><span lang="en"><?= $caracteristica->getM_Cuerpos()?></span></strong> y número de clavijas =  <strong><span lang="en"><?= $caracteristica->getN_Clavijas() ?></span></strong>

        </div>

        
    </div>
    <a href="acciones/delete_caracteristica_acc.php?id=<?= $caracteristica->getId_caracteristica()?>" role="button" class="btn btn-danger">Eliminar</a>

</div>