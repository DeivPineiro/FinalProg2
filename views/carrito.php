<?php $instrumentos = (new Carrito())->get_carrito(); ?>



    <h1 class="text-center fs-2 my-5"> Carrito</h1>
    <div class="container-xxl my-4">

        <?= (new Alert())->get_alerta(); ?>
        <?PHP if (count($instrumentos)) { ?>
            <form action="admin/acciones/update_instrumentosCarrito_acc.php" method="POST">
                <table class="table-responsive pt-4 justify-content-center mx-0">

                    <thead>
                        <tr class="bg-light rounded border border-warning nav-back2 ">
                            <th scope="col" width="15%">Imagen</th>
                            <th scope="col">Datos</th>
                            <th scope="col" width="15%">Cantidad</th>
                            <th class="text-end" scope=" col" width="15%">Precio Unitario</th>
                            <th class="text-end" scope="col" width="15%">Subtotal</th>
                            <th class="text-end" scope="col" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach ($instrumentos as $i => $instrumento) { ?>
                            <tr class="bg-light rounded border border-warning">
                                <td><img src="img/instrumentos/<?= $instrumento['img'] ?>" alt="<?= $instrumento['serie'] ?>" class="img-fluid rounded shadow-sm"></td>

                                <td class="align-middle">
                                    <h2 class="h5"><?= $instrumento['nombre'] ?></h2>
                                    <p><?= $instrumento['serie'] ?></p>
                                </td>
                                <td class="align-middle">
                                    <label for="q_<?= $i ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" class="form-control" value="<?= $instrumento['cantidad'] ?>" id="q_<?= $i ?>" name="q[<?= $i ?>]">
                                </td>
                                <td class="text-end align-middle">
                                    <p>$USD<?= number_format($instrumento['precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <p> $USD<?= number_format($instrumento['cantidad'] * $instrumento['precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <a href="admin/acciones/delete_instrumentoCarrito_acc.php?id=<?= $i ?>" class="btn btn-sm btn-danger mx-3">Eliminar</a>
                                </td>
                            </tr>
                        <?PHP } ?>

                        <tr>
                            <td colspan="4" class="text-end">
                                <h2 class="h5 py-3">Total:</h2>
                            </td>
                            <td class="text-end">
                                <p class="my-3 fw-bold">$USD <?= number_format((new Carrito())->total(), 2, ",", ".") ?></p>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end gap-2">
                    <input type="submit" value="Actualizar Cantidades" class="btn btn-warning">
                    <a href="admin/acciones/clear_instrumentosCarrito_acc.php" role="button" class="btn btn-danger">Vaciar carrito</a>
                    <a href="admin/acciones/finalizarCompra_acc.php" role="button" class="btn btn-success">Comprar</a>
                </div>
            </form>
        <?PHP } else { ?>
            <h2 class="h4 text-center mb-5 text-danger">Aca no hay nada</h2>
            <div class="tenor-gif-embed m-auto border border-warning rounded" data-postid="20765263" data-share-method="host" data-aspect-ratio="1.47465" data-width="50%"><a href="https://tenor.com/view/travolta-desert-dry-drought-gif-20765263">Travolta Desert GIF</a>from <a href="https://tenor.com/search/travolta-gifs">Travolta GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
            <div class="d-flex justify-content-end gap-2">
                <a href="index.php?sec=catalogo_completo" role="button" class=" btn btn-danger">Ir a tienda</a>
            </div>
        <?PHP } ?>


    </div>
