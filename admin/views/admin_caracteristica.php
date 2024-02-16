<?php


$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if ($userData['rol'] == 'edit') {

    $resp = 'd-none';
} elseif ($userData['rol'] == 'usuario') {

    header('Location: ../index.php');
}

$caracteristica = (new Caracteristicas())->cargar_catalogo();

?>

<h1 class="text-center mt-2">Administrador de Caracteristicas</h1>
<?= (new Alert())->get_alerta(); ?>
<div class="table-responsive pt-4 justify-content-center mx-0">
    <table class="table table-striped">

        <thead>
            <tr class="bg-light rounded border border-warning nav-back2 ">
                <th scope="col">Id (Tipo modelo)</th>
                <th scope="col">Material Mastil</th>
                <th scope="col">Material Cuerpo</th>
                <th scope="col">N Clavijas</th>
                <th scope="col">N Trastes</th>
                <th scope="col">Tipo Mastil</th>
                <th scope="col">Pastillas (Id's, Modelo)</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($caracteristica as $i) {

                $pastillas = $i->getPastillas();
                $resultado = "";
                $modeloIns = "";
                foreach ($pastillas as $p) {

                    if ($resultado == "") {
                        $resultado = $resultado . " " . $p->getId_Pastilla() . ", " . $p->getModelo();
                    } else {

                        $resultado = $resultado . " | " . $p->getId_Pastilla() . ", " . $p->getModelo();
                    }
                }
         
                if($i->getModelo_Ins($i->getId_caracteristica()) == "")
                {
                    $modeloIns = "Modelo no encotrado";
                    

                }else{$modeloIns = $i->getModelo_Ins($i->getId_caracteristica())->modelo; }
            ?>
                <tr class="bg-light rounded border border-warning">
                    <td class="text-center"><?= $i->getId_caracteristica() ." "."(". $modeloIns .")"?></td>
                    <td><?= $i->getM_Mastil() ?></td>
                    <td><?= $i->getM_Cuerpos() ?></td>
                    <td><?= $i->getN_Clavijas() ?></td>
                    <td><?= $i->getN_Trastes() ?></td>
                    <td><?= $i->getT_Mastil() ?></td>
                    <td><?= $resultado ?></td>
                    <td> <a style="min-width: 100px;" href="index.php?sec=edit_caracteristica&id=<?= $i->getId_caracteristica() ?>" role="button" class="btn btn-sm btn-success mb-1">Editar</a>
                        <a style="min-width: 100px;" href="index.php?sec=delete_caracteristica&id=<?= $i->getId_caracteristica() ?>" role="button" class="btn btn-sm btn-danger <?= $resp ?>">Eliminar</a>
                    </td>

                    </td>
                </tr>

            <?php } ?>
        </tbody>


    </table>
    <a style="min-width: 100px;" href="index.php?sec=add_caracteristica" role="button" class="btn-primary btn-sm btn  mb-2">Cargar</a>


</div>