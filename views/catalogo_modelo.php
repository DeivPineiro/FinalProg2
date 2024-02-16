<?php

$modelo = $_GET['modelo'] ?? FALSE;
$miObjGtr = new Guitarra();
$instrumentos = $miObjGtr->catalogo_por_modelo($modelo);


?>
<div class="container bg-white my-5 rounded shadow">
<h1 class="h2 text-center p-4 text-secondary">Catalogo <?=$modelo ?></h1>

<div class="row">

    <?PHP
    foreach ($instrumentos as $guitarra) {
        
        
        $caracteristica = (new Caracteristicas())->get_x_id($guitarra->getId_caracteristica());



        $pastillas = $caracteristica->getPastillasObj($caracteristica->getPastillas());
        $resultado = "";        
        foreach ($pastillas as $i)
        {
        
        $resultado = $resultado . " pastilla de " ."<strong>".$i->getPosicion()."</strong>" . " modelo " ."<strong>". $i->getModelo()."</strong>";
        
        }

    ?>
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-3">
                    <img src="img/instrumentos/<?= $guitarra->getImg() ?>" class="card-img-top p-3" alt="Guitarra <?= $guitarra->getSerie(); ?>">

                    <div class="card-body">
                        <h2 class="h5"><?= $guitarra->getSerie() ?></h2>
                        <p><strong><span lang="en"><?=$guitarra->getNombre()?></span></strong> modelo <strong><span lang="en"><?= $guitarra->getModelo() ?></span></strong> serie <strong><span lang="en"><?= $guitarra->getSerie() ?></span></strong> de <strong><span lang="en"><?= $guitarra->getClavijas() ?></span></strong> cuerdas, con un bello mastil de <strong><span lang="en"><?= $guitarra->getMastil() ?></span></strong> con terminacion en <strong><span lang="en"><?= $guitarra->getPerfilMastil() ?></span></strong>
                        
                        
                        
                        , tambien posse respaldo <strong><span lang="en">Fender</span></strong> en sus microfonos (<?=$resultado?>), y con <strong><?= $guitarra->getCantTrastes() ?> trastes.</strong> </p>

                        <div class="card-body">
                            <div class="fs-4 mb-3 text-center text-success"><?= $guitarra->getPrecio() ?> $USD</div>
                            <a href="index.php?sec=instrumento&id=<?= $guitarra->getid() ?>" class="btn btn-warning w-40 d-grid gap-2 col-6 mx-auto min-width ">Ver mas...</a>
                        </div>

                    </div>

                </div>
            </div>
        
        <?php
    }
    ?>

</div>
</div>