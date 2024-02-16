<?php
$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if ($userData['rol'] == 'usuario') {

    header('Location: ../index.php');
}
?>
<div class="container">

    <div class="col">

        <h1 class="h2 text-center fw-bold">Agregar nuevo Instrumento</h1>

        <div class="row d-flex aling-items-center">

            <form class="row bg-light rounded border border-warning p-3" action="acciones/add_instrumento_acc.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">

                    <label for="nombre">Nombre</label>
                    <select class="form-select" id="nombre" name="nombre" required>
                        <option selected></option>
                        <option value="Guitarra">Guitarra</option>
                        <option value="Bajo">Bajo</option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="marca">Marca</label>
                    <input class="form-control" id="marca" type="text" name="marca" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="modelo">Modelo</label>
                    <input class="form-control" id="modelo" type="text" name="modelo" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="serie">Serie</label>
                    <input class="form-control" id="serie" type="text" name="serie" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="id_caracteristica">Id Caracteristica</label>
                    <select class="form-select" id="id_caracteristica" name="id_caracteristica" required>
                        <option selected></option>
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
                    <input class="form-control" id="color" type="text" name="color" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="img">Imagen</label>
                    <input class="form-control" id="img" type="file" name="imagen" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="precio">Precio</label>
                    <input class="form-control" id="precio" type="text" name="precio" required>

                </div>

                <button type="submit" class="btn btn-success my-4 col-12">Agregar</button>

            </form>

        </div>

    </div>

</div>