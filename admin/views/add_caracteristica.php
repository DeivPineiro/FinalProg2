<?php

$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){
    header('Location: ../index.php');    
}

$pastillas = (new Pastillas())->cargar_catalogo();

?>

<div class="container mt-3 mb-5">

    <div class="col">

        <h1 class="h2 text-center fw-bold">Agregar Caracteristica</h1>

        <div class="row d-flex aling-items-center">

            <form class="row bg-light rounded border border-warning p-3" action="acciones/add_caracteristica_acc.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                
                <label for="m_Mastil">Material mastil</label>                    
                <select class="form-select" id="m_Mastil" name="m_Mastil" required>
                        <option selected>...</option>
                        <option value="Maple">Maple</option>
                        <option value="Rosewood">Rosewood</option>
                        
                    </select>
                
                </div>

                <div class="col-md-6 mb-3">

                <label for="m_Mastil">Material cuerpo</label>                    
                <select class="form-select" id="m_Cuerpos" name="m_Cuerpos" required>
                        <option selected>...</option>
                        <option value="Maple">Maple</option>
                        <option value="Rosewood">Rosewood</option>
                        
                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="n_Clavijas">Número de clavijas</label>
                    <input  class="form-control" id="n_Clavijas" type="text" name="n_Clavijas" required>

                </div>

                <div class="col-md-6 mb-3">

                    <label for="n_Trastes">Número de trastes</label>
                    <input class="form-control" id="n_Trastes" type="text" name="n_Trastes" required>

                </div>

                
				<div class="col-md-12 mb-3">

					<label class="form-label d-block fw-bold">Pastillas:</label>

					<?PHP foreach ($pastillas as $P) {	?>

						<div class="form-check form-check-inline col-md-5">

							<input class="form-check-input" type="checkbox" name="pastillas[]" id="pastillas_<?= $P->getId_Pastilla() ?>" value="<?= $P->getId_Pastilla() ?>">
							<label class="form-check-label mb-2" for="pastillas_<?= $P->getId_Pastilla()?>"><?= $P->getModelo()?>, posicion: <?=$P->getPosicion()?>, color: <?=$P->getColor()?> </label><hr>
						</div>
					<?PHP } ?>
				</div>

                <div class="col-md-6 mb-3">

                    <label for="t_Mastil">Tipo mastil</label>
                    <input class="form-control" id="t_Mastil" type="text" name="t_Mastil" required>

                </div>


                <button type="submit" class="btn btn-success my-4 col-12">Cargar</button>

            </form>

        </div>

    </div>

</div>