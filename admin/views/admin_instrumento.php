<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol'] == 'edit')
{
 
    $resp = 'd-none';
   
}elseif($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}


$instrumento = (new Guitarra())->cargar_catalogo();

?>
<h1 class="text-center mt-2">Administrador de Instrumentos</h1>
<?= (new Alert())->get_alerta();?>
<div class="table-responsive pt-4 justify-content-center mx-0">
    <table class="table table-striped">

        <thead>
            <tr class="bg-light rounded border border-warning nav-back2 ">
                <th scope="col">Imagen</th>
                <th scope="col">Marca</th>
                <th scope="col">Nombre</th>
                <th scope="col">Modelo</th>
                <th scope="col">Serie</th>
                <th scope="col" style="  width: 8%;
  table-layout: fixed;">Id Carac.</th>
                <th scope="col">Color</th>
                <th scope="col" style="  width: 1%;
  table-layout: fixed;">Id</th>
                <th scope="col" style="  width: 10%;
  table-layout: fixed;">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

<?php foreach ($instrumento as $i){ ?>
        <tr class="bg-light rounded border border-warning">
        <td ><img class="img-fluid rounded border border-warning p-1 bg-light" src="../img/instrumentos/<?= $i->getImg()?>" alt="<?= $i->getSerie()?>"></td>
        <td><?= $i->getMarca() ?></td>
        <td><?= $i->getNombre() ?></td>
        <td><?= $i->getModelo() ?></td>
        <td><?= $i->getSerie() ?></td>
        <td class="text-center"  ><?= $i->getId_caracteristica() ?></td>
        <td><?= $i->getColor() ?></td>
        <td><?= $i->getid() ?></td>
        <td><?= $i->getPrecio() ?> USD$</td>
        <td>
            <a style="min-width: 100px;" href="index.php?sec=edit_instrumento&id=<?= $i->getid()?>" role="button" class="btn btn-sm btn-success mb-1">Editar</a>
            <a style="min-width: 100px;"  href="index.php?sec=delete_instrumento&id=<?= $i->getid()?>" role="button" class="btn btn-sm btn-danger <?=$resp?>">Eliminar</a>
            
        </td>
        </tr>

        <?php } ?>
        </tbody>

       
    </table>
    <a style="min-width: 100px;" href="index.php?sec=add_instrumento" role="button" class="btn-primary btn-sm btn  mb-2">Cargar</a>


</div>