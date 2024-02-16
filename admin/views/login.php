<?php


$userRol = $_SESSION['rol'] ?? FALSE;
$resp = "";

if(!$userRol == "")
{
if($userRol['rol'] == 'edit')
{
 
    $resp = 'd-none';
   
}elseif($userRol['rol']== 'usuario'){

    header('Location: ../index.php');
   
}

}


?>

<div class="container justify-content-center p-0 m-0">

    <div>

        <h1 class="text-center">INICIO DE SESIÓN</h1>

       

        <form class="row mt-5 container p-0 m-0 " action="acciones/auth_login.php" method="POST">
        <div class="col-7 m-auto">
            <?= (new Alert())->get_alerta();?>
        </div>

            <div class="col-md-7 mb-3 m-auto bg-light p-4 rounded border border-warning nav-back2">

                <label for="nombre_usuario" class="form-label bg-light rounded border border-warning">Nombre de Usuario</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control">

            </div>

            <div class="col-md-7 mb-3 m-auto bg-light p-4 rounded border border-warning nav-back2">

                <label for="password" class="form-label bg-light rounded border border-warning ">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">

            </div>

            <button type="submit" class="btn btn-success col-6 m-auto border border-warning ">Iniciar sesión</button>

        </form>

    </div>
</div>