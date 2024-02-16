<?php
$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";
if($userData['rol']== 'usuario'){

    header('Location: ../index.php');

    
}
?>
<div class="container justify-content-center p-3">

<div>
<?=(new Alert())->add_alerta('secondary', "Bienvenidos al administrador de Fendardo, recuerda que para eliminar primero debes comenzar con el Instrumento, luego la característica y al final la pastilla. Exitos!!!");?>
    <h1 class="text-center">PANEL DE ADMINISTRADOR</h1>
   
    <div class="text-center"><?= (new Alert())->get_alerta();?></div>
</div>

<div class="row py-5">

<img src="../img/elvis.png" class="m-auto" style="max-width: 250px;" alt="Elvis">

</div>

</div>