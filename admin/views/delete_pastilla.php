<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}

$id = $_GET['id'] ?? FALSE;
$pastillas = (new Pastillas())->get_x_id($id);

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}


?>

<div class="container col-lg-10 col-sm-12 my-5 ">
    <div class="card mb-3 bg-light rounded border border-warning p-3">

        <div class="card-body text-center">


            <h1 class="h5 text-center fw-bold"><strong><span lang="en">¿Esta seguro de borrar pastilla con ID: <?= $pastillas->getId_Pastilla() ?>?</span></strong></h1>
            <p>Marca: <strong><span lang="en"><?= $pastillas->getMarca() ?></span></strong>, Modelo: <strong><span lang="en"><?= $pastillas->getModelo()?></span></strong> y Color: <strong><span lang="en"><?= $pastillas->getColor() ?></span></strong>

        </div>

        
    </div>
    <a href="acciones/delete_pastilla_acc.php?id=<?= $pastillas->getId_Pastilla()?>" role="button" class="btn btn-danger">Eliminar</a>

</div>