<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}

$id= $_GET['id'] ?? FALSE;
$instrumento = (new Guitarra())->instrumento_x_id($id);

?>


<div class="container aling-items-center mt-3 mb-5 px-0">


        <h1 class="h2 text-center fw-bold">Editar Instrumento</h1>

       

            <form class="row bg-light rounded border border-warning mx-0 p-md-2" action="acciones/edit_instrumento_acc.php?id=<?= $instrumento->getid()?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
        
                    <label for="nombre">Nombre</label>
                    <select class="form-select" id="nombre" name="nombre" required>
                        <option selected><?= $instrumento->getNombre() ?></option>
                        <option value="Guitarra">Guitarra</option>
                        <option value="Bajo">Bajo</option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="marca">Marca</label>
                    <input value="<?=$instrumento->getMarca()?>" class="form-control" id="marca" type="text" name="marca" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="modelo">Modelo</label>
                    <input value="<?=$instrumento->getModelo()?>" class="form-control" id="modelo" type="text" name="modelo" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="serie">Serie</label>
                    <input value="<?=$instrumento->getSerie()?>" class="form-control" id="serie" type="text" name="serie" required>

                </div>

                <div class="col-md-6 mb-3">

                  
                    
                    <label for="id_caracteristica">Id Caracteristica</label>
                    <select class="form-select" id="id_caracteristica" name="id_caracteristica" required>
                        <option selected><?=$instrumento->getId_caracteristica()?></option>
                        <?php

                        $caracteristica = (new Caracteristicas())->cargar_catalogo();
                        foreach ($caracteristica as $i) {

                            $modeloIns = "";
                            if ($i->getModelo_Ins($i->getId_caracteristica()) == "") {
                                $modeloIns = "Modelo no encotrado";
                            } else {
                                $modeloIns = $i->getModelo_Ins($i->getId_caracteristica())->modelo;
                            }
                        ?>
                            <option value="<?= $i->getId_caracteristica() ?>"><?= $i->getId_caracteristica() . " (" . $modeloIns . ")" ?></option>

                        <?php

                        }
                        ?>
                      

                    </select>
                </div>

                <div class="col-md-6 mb-3">

                    <label for="color">Color</label>
                    <input value="<?=$instrumento->getColor()?>" class="form-control" id="color" type="text" name="color" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label" for="img">Imagen actual</label>
                    <img src="../img/instrumentos/<?= $instrumento->getImg()?>" alt="<?=$instrumento->getSerie()?>" class="img-fluid rounded border border-warning">
                    <input class="form-control" type="hidden" id="img_original" type="file" name="img_original" value="<?=$instrumento->getImg()?>">

                </div>

                <div class="col-md-6 mb-3">

                <label for="img" class="form-label">Reemplazar imagen</label>
                <input type="file" id="img" name="img" class="form-control">




                </div>

                <div class="col-md-6 mb-3">

                    <label for="precio">Precio</label>
                    <input value="<?=$instrumento->getPrecio()?>" class="form-control" id="precio" type="text" name="precio" required>

                </div>

                <button  type="submit" class="btn btn-success my-md-4 col-6 col-md-12 m-auto " >Editar</button>

            </form>

    

    

</div>