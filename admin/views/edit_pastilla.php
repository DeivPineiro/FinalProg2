<?php

$id = $_GET['id'] ?? FALSE;
$pastilla = (new Pastillas())->get_x_id($id);

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}
?>


<div class="container mt-3 mb-5">


    <h1 class="h2 text-center fw-bold">Editar pastilla</h1>


    <form class="row bg-light rounded border border-warning p-3" action="acciones/edit_pastilla_acc.php?id=<?= $pastilla->getId_Pastilla()?>" method="POST" enctype="multipart/form-data">

        <div class="col-md-6 mb-3">

            <label for="marca">Marca</label>
            <input value="<?= $pastilla->getMarca() ?>" class="form-control" id="marca" type="text" name="marca" required>

        </div>

        <div class="col-md-6 mb-3">

            <label for="modelo">Modelo</label>
            <input value="<?= $pastilla->getModelo() ?>" class="form-control" id="modelo" type="text" name="modelo" required>

        </div>

        <div class="col-md-6 mb-3">

            <label for="color">Color</label>
            <input value="<?= $pastilla->getColor() ?>" class="form-control" id="color" type="text" name="color">

        </div>

        <div class="col-md-6 mb-3">

            <label for="m_Mastil">Posición</label>
            <select class="form-select" id="posicion" name="posicion" required>
                <option selected><?= $pastilla->getPosicion() ?></option>
                <option value="mastil">mastil</option>
                <option value="central">central</option>
                <option value="puente">puente</option>

            </select>

        </div>


        <button type="submit" class="btn btn-success my-4 col-12">Editar</button>

    </form>





</div>