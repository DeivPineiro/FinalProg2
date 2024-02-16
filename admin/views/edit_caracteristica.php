<?php

$id = $_GET['id'] ?? FALSE;
$caracteristica = (new Caracteristicas())->get_x_id($id);
$pastilla = (new Pastillas())->cargar_catalogo();

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}
?>



<div class="container mt-3 mb-5">

   

        <h1 class="h2 text-center fw-bold">Editar Caracteristica</h1>

     

            <form class="row bg-light rounded border border-warning p-3" action="acciones/edit_caracteristica_acc.php?id=<?= $caracteristica->getId_caracteristica() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">

                    <label for="m_Mastil">Material mastil</label>
                    <select class="form-select" id="m_Mastil" name="m_Mastil" required>
                        <option selected><?= $caracteristica->getM_Mastil() ?></option>
                        <option value="Maple">Maple</option>
                        <option value="Rosewood">Rosewood</option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="m_Mastil">Material cuerpo</label>
                    <select class="form-select" id="m_Cuerpos" name="m_Cuerpos" required>
                        <option selected><?= $caracteristica->getM_Cuerpos() ?></option>
                        <option value="Maple">Maple</option>
                        <option value="Rosewood">Rosewood</option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="n_Clavijas">Número de clavijas</label>
                    <input value="<?= $caracteristica->getN_Clavijas() ?>" class="form-control" id="n_Clavijas" type="text" name="n_Clavijas" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="n_Trastes">Número de trastes</label>
                    <input value="<?= $caracteristica->getN_Trastes() ?>" class="form-control" id="n_Trastes" type="text" name="n_Trastes" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="t_Mastil">Tipo mastil</label>
                    <input value="<?= $caracteristica->getT_Mastil() ?>" class="form-control" id="t_Mastil" type="text" name="t_Mastil" required>

                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label d-block fw-bold">Pastillas:</label>

                    <?PHP foreach ($pastilla as $P) {
                        $p_selected = $caracteristica->getPastillas_ids() ?>

                        <?php
                     

                        ?>

                        <div class="form-check form-check-inline col-md-5">

                            <input class="form-check-input" type="checkbox" name="pastillas[]" id="pastillas_<?= $P->getId_Pastilla() ?>" value="<?= $P->getId_Pastilla() ?>" <?= in_array($P->getId_Pastilla(), $p_selected) ? "checked" : "" ?>>
                            <label class="form-check-label mb-2" for="pastillas_<?= $P->getId_Pastilla() ?>"><?= $P->getModelo() ?>, posicion: <?= $P->getPosicion() ?>, color: <?= $P->getColor() ?> </label>
                            <hr>
                        </div>
                    <?PHP } ?>
                </div>


                <button type="submit" class="btn btn-success my-4 col-12">Editar</button>

            </form>

       

    

</div>