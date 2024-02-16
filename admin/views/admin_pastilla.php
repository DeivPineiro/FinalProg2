<?php


$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol'] == 'edit')
{
 
    $resp = 'd-none';
   
}elseif($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}

$pastilla = (new Pastillas())->cargar_catalogo();

?>
<h1 class="text-center mt-2">Administrador de Pastillas</h1>
<?= (new Alert())->get_alerta();?>
<div class="table-responsive pt-4 justify-content-center mx-0">
    <table class="table table-striped">

        <thead>
            <tr class="bg-light rounded border border-warning nav-back2 ">
                <th scope="col">Id</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Color</th>
                <th scope="col">Posicion</th>
                <th></th>
                
                
            </tr>
        </thead>

        <tbody>

<?php foreach ($pastilla as $i){ ?>
        <tr class="bg-light rounded border border-warning">        
        <td><?= $i->getId_Pastilla() ?></td>
        <td><?= $i->getMarca() ?></td>
        <td><?= $i->getModelo() ?></td>
        <td><?= $i->getColor()?></td>
        <td><?= $i->getPosicion()?></td>

        <td>
            <a style="min-width: 100px;" href="index.php?sec=edit_pastilla&id=<?= $i->getId_Pastilla()?>" role="button" class="btn btn-sm btn-success mb-1">Editar</a>
            <a style="min-width: 100px;" href="index.php?sec=delete_pastilla&id=<?= $i->getId_Pastilla()?>" role="button" class="btn btn-sm btn-danger <?=$resp?>">Eliminar</a>
            
        </td>
        </tr>

        <?php } ?>
        </tbody>

       
    </table>
    <a style="min-width: 100px;" href="index.php?sec=add_pastilla" role="button" class="btn-primary btn-sm btn  mb-2">Cargar</a>


</div>