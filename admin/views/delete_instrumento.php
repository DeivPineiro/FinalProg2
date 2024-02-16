<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}

$id = $_GET['id'] ?? FALSE;
$instrumento = (new Guitarra())->instrumento_x_id($id);

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}


?>

<div class="container col-lg-10 col-sm-12 my-5 ">
    <div class="card mb-3 bg-light rounded border border-warning p-3">

        <div class="card-body">


            <h1 class="h5 text-center fw-bold"><strong><span lang="en">¿Esta seguro de borrar <?= $instrumento->getSerie() ?>?</span></strong></h1>
            <p> <strong><span lang="en"><?= $instrumento->getNombre() ?></span></strong> modelo <strong><span lang="en"><?= $instrumento->getModelo() ?></span></strong> serie <strong><span lang="en"><?= $instrumento->getSerie() ?></span></strong>

        </div>

        <img src="../img/instrumentos/<?= $instrumento->getImg()?>" class="img-fluid card-img-bottom p-3" alt="Guitarra <?= $instrumento->getNombre(); ?>">


    </div>
    <a href="acciones/delete_instrumento_acc.php?id=<?= $instrumento->getid()?>" role="button" class="btn btn-danger">Eliminar</a>

</div>