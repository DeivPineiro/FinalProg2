<?PHP

$id = $_GET['id'] ?? FALSE;

$miObjGtr = new Guitarra();
$instrumento = $miObjGtr->instrumento_x_id($id);

$caracteristica = (new Caracteristicas())->get_x_id($instrumento->getId_caracteristica());



$pastillas = $caracteristica->getPastillasObj($caracteristica->getPastillas());
$resultado = "";        
foreach ($pastillas as $i)
{

$resultado = $resultado . " pastilla de " ."<strong>".$i->getPosicion()."</strong>" . " modelo " ."<strong>". $i->getModelo()."</strong>";

}




?>

<div class=" d-flex justify-content-center pt-5  px-ms-0 mb-5">
    <div>
        <div class="container-xl bg-white rounded shadow">

            <div class="row">

     

                <?PHP if ($instrumento!= null) { ?>

                    <div class="container col-lg-10 col-sm-12 my-5 ">
                        <div class="card mb-3">

                            <div class="card-body">
                                
                               
                                <h1 class="h5 text-center "><strong><span lang="en"><?= $instrumento->getSerie() ?></span></strong></h1>
                                <p>  <strong><span lang="en"><?= $instrumento->getNombre() ?></span></strong> modelo <strong><span lang="en"><?= $instrumento->getModelo() ?></span></strong> serie <strong><span lang="en"><?= $instrumento->getSerie() ?></span></strong> con un bello mastil de <strong><span lang="en"><?= $instrumento->getMastil() ?></span></strong> con terminacion en <strong><span lang="en"><?= $instrumento->getPerfilMastil() ?></span></strong> y un cuerpo macizo de <strong><span lang="en"><?= $instrumento->getCuerpo() ?></span></strong>. </p>


                            </div>

                            <img src="img/instrumentos/<?= $instrumento->getImg() ?>" class=" card-img-bottom p-3" alt="Guitarra <?= $instrumento->getNombre(); ?>">
                            <div class="card-body">

                           

                                <p>Su bello color <strong><span lang="en"><?= $instrumento->getColor() ?></span></strong> la hace destacar, tambien posse respaldo <strong><span lang="en">Fender</span></strong> en sus microfonos (<?=$resultado?>), este modelo de <strong><span lang="en"><?= $instrumento->getNombre() ?></span></strong> viene con <strong><?= $instrumento->getCantTrastes() ?> trastes</strong> y con <strong><?= $instrumento->getClavijas() ?> cuerdas</strong>. </p>
                            </div>

                            <div class="card-body">
                                <div class="fs-4 mb-3 text-center text-success"><?= $instrumento->getPrecio() ?> $USD</div>
                               

                                <form action="admin/acciones/add_instrumentoCarrito_acc.php" method="GET" class="col-6 m-auto">                                    
                                    <div class="col-4 d-flex d-inline m-auto">
                                        <input type="submit" value="Agregar al carrito" class="btn btn-warning w-100 m-auto">
                                        <input type="hidden" value="<?= $id ?>" name="id" id="id">
                                    </div>
                                    <div class="col-4 d-flex align-items-center d-inline m-auto mt-4">
                                        <label for="cantidad" class="fw-bold me-2">Cantidad: </label>
                                        <input type="number" class="form-control" value="1" name="cantidad" id="cantidad">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>



                <?PHP } else { ?>
                    <div class="col">
                        <h2 class="text-center m-5">No se encontró el instrumento deseado.</h2>
                        
                <div class="tenor-gif-embed" data-postid="10251428" data-share-method="host" data-aspect-ratio="1.03734" data-width="100%"><a href="https://tenor.com/view/pulp-fiction-john-travolta-lost-where-wtf-gif-10251428">Pulp Fiction John Travolta GIF</a>from <a href="https://tenor.com/search/pulp+fiction-gifs"></a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                    </div>
                <?PHP } ?>


            </div>
        </div>

    </div>
</div>