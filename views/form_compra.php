<?PHP

$id = $_GET['id'] ?? FALSE;

$miObjGtr = new Guitarra();

$instrumento = $miObjGtr->instrumento_x_id($id);

?>

<div class="justify-content-center p-5">
    <div>




        <?PHP if (!empty($instrumento)) { ?>

            <div class="container w-100 col-lg-10 col-sm-12 aling-items-center d-flex justify-content-center ">


                <div class="card mb-3">

                    <div class="card-body">
                        <h1 class="h3 text-center mb-4 text-center">Vas a comprar <?= $instrumento->getNombre() ?>!!!</h1>
                        <p class="text-center" style="color:lightsalmon" > Antes que nada necesitamos que te identifiques y elijas un medio de pago.</p>
                    </div>



                    <form action="views/POST_compra.php" method="POST">

                        <div class="row justify-content-around">

                            <h2 class="h4 mx-2 mb-3 text-center">Login</h2>





                            <div class="form-floating col-md-5 m-3">

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
                                    <label for="usuario" class="form-label txt-color-grey">Usuario</label>
                                </div>

                            </div>

                            <div class="form-floating col-5 m-3">

                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" id="apellido" name="pass" placeholder="pass">
                                    <label for="pass" class="form-label txt-color-grey">Contraseña</label>
                                </div>

                            </div>

                            <div class="form-floating col-md-5 m-3">

                                <select class="form-select" id="medio" name="medio" placeholder="medio">
                                    <option selected>Medio de pago</option>
                                    <option value="TC">Tarjeta de credito</option>
                                    <option value="MP">Mercado Pago</option>
                                    <option value="otro">Otros medios...</option>
                                </select>

                            </div>
                        </div>
                        <div class="card-body row justify-content-around">
                            <div class="fs-4 mb-3 text-center text-success ">Total: <?= $instrumento->getPrecio() ?></div>
                            <button type="submit" class="m-auto btn btn-warning col-4">Comprar</button>
                        </div>









                </div>
                </form>



            </div>







        <?PHP } else { ?>
            <div class="col">
                <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
            </div>
        <?PHP } ?>




    </div>

</div>
</div>