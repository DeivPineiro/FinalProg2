<?php
$userRol = $_SESSION ?? FALSE;
// echo "<pre>";
// print_r($userRol);
// echo "</pre>";


?>




<div class="container-xxl bg-white my-5 rounded shadow">
    <h1 class="h2 text-center p-4 py-5 text-secondary">Gracias por tu compra <?= $userRol['loggedIn']['nombre_usuario'] ?> !!! </h1>

    <?php
    $Total = 0;
    foreach ($userRol['carrito'] as $i) {     
        
        $Total = $Total + $i['precio'];
    ?>
    <div class="row mb-5 d-flex align-items-center">
        <h2 class="px-5 h5"><?=$i['serie']?></h2>
        <div class="m-auto col-sm-10 col-lg-7"><img src="img/instrumentos/<?=$i['img']?>" class="d-block img-fluid border p-1 mb-3 mx-lg-3 mx-sm-auto img-fluid bg-warning" ></div>

        <div class="col-lg-5 col-sm-12">

            <div class="mx-lg-4 mx-ms-5 text-center fs-5">

               <ul style="list-style: none;">
        <li>
        <?="Instrumento: " .$i['nombre']?>
        </li>
        <li>
        <?="Serie: " .$i['serie']?>
        </li>
        <li>
        <?="Precio: " ."USD ".$i['precio']?>
        </li>
        <li>
        <?="Unidades: " .$i['cantidad']?>
        </li>


               </ul>

             

            </div>

        </div>

    </div>

<?php } ?>
<div class="container text-center p-3">
<h3 class="susses">Total: <?=$Total?></h3>
<p>Revisa tu correo para ver la factura y coordinar envio.</p>
<a href="admin/acciones/clear_instrumentosCarrito_acc.php" role="button" class="btn btn-success">Finalizar</a>
</div>
</div>