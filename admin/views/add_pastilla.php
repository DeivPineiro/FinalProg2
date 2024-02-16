<?php
$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}
?>
<div class="container mt-3 mb-5">

    <div class="col">

        <h1 class="h2 text-center fw-bold">Agregar pastilla</h1>

        <div class="row d-flex aling-items-center">

            <form class="row bg-light rounded border border-warning p-3" action="acciones/add_pastilla_acc.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">

                    <label for="marca">Marca</label>
                    <input class="form-control" id="marca" type="text" name="marca" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="modelo">Modelo</label>
                    <input class="form-control" id="modelo" type="text" name="modelo" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="color">Color</label>
                    <input class="form-control" id="color" type="text" name="color" required>

                </div>
                
                <div class="col-md-6 mb-3">

                    <label for="m_Mastil">Posicion</label>
                    <select class="form-select" id="posicion" name="posicion" required>
                        <option selected>...</option>
                        <option value="mastil">mastil</option>
                        <option value="central">central</option>
                        <option value="puente">puente</option>

                    </select>

                </div>



                <button type="submit" class="btn btn-success my-4 col-12">Cargar</button>

            </form>

        </div>

    </div>

</div>