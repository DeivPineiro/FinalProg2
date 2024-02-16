<?PHP

require_once "../funciones/auto_log.php";



$sec_ok = [
    "dashboard" => [

        "titulo" => "Panel de administrador",
        "private" => TRUE

    ],
    "admin_instrumento" => [

        "titulo" => "Administración Instrumentos",
        "private" => TRUE

    ],
    "add_instrumento" => [

        "titulo" => "Agregar Instrumentos",
        "private" => TRUE

    ],
    "edit_instrumento" => [

        "titulo" => "Editar Instrumentos",
        "private" => TRUE

    ],
    "delete_instrumento" => [

        "titulo" => "Eliminar Instrumentos",
        "private" => TRUE

    ],
    "login" => [

        "titulo" => "Iniciar sesión",
        "private" => FALSE

    ],
    "admin_caracteristica" => [

        "titulo" => "Administración Caracteristicas",
        "private" => TRUE

    ],
    "edit_caracteristica" => [

        "titulo" => "Editar Caracteristicas",
        "private" => TRUE

    ],
    "add_caracteristica" => [

        "titulo" => "Agregar Caracteristicas",
        "private" => TRUE

    ],
    "delete_caracteristica" => [

        "titulo" => "Eliminar Caracteristica",
        "private" => TRUE

    ],
    "admin_pastilla" => [

        "titulo" => "Administración pastillas",
        "private" => TRUE

    ],
    "edit_pastilla" => [

        "titulo" => "Editar pastillas",
        "private" => TRUE

    ],
    "add_pastilla" => [

        "titulo" => "Agregar pastillas",
        "private" => TRUE

    ],
    "delete_pastilla" => [

        "titulo" => "Eliminar pastilla",
        "private" => TRUE

    ]


];



$sec = $_GET['sec'] ?? "login";


if (!array_key_exists($sec, $sec_ok)) {
    $view = "404";
    $titulo = "404 - AHHHHHHHHHHHH";
} else {

    $view = $sec;

    if ($sec_ok[$sec]['private']) {
        (new Autenticacion())->verificar();
    }

    $titulo = $sec_ok[$sec]['titulo'];
}


$userData = $_SESSION['loggedIn'] ?? FALSE;

?>


<!DOCTYPE html>
<html class="pb-5" lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Fendardo: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;300;400&display=swap" rel="stylesheet">


    <link href="css/mycss.css" rel="stylesheet">


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning nav-back border-danger border-bottom p-0 m-0">

        <div class="container-fluid p-0 m-1">


            <a class="navbar-brand h3 p-0 m-0 d-none d-md-block" href="../index.php">Fendardo Music </a>
            <img style="width: 80px;" src="../img/logo.png" alt="logo">
            <p class="m-4 d-none d-sm-none d-md-block ">Administrador</p>
            <button class="navbar-toggler mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link active" href="index.php?sec=dashboard"> <strong>Dashboard</strong> </a>

                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?> <?= $resp ?>">
                        <a class="nav-link active" href="index.php?sec=admin_instrumento"> <strong>Instrumentos</strong> </a>

                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link active" href="index.php?sec=admin_caracteristica"> <strong>Caracteristicas</strong> </a>

                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link active" href="index.php?sec=admin_pastilla"> <strong>Pastillas</strong> </a>

                    </li>

                    <div style="max-width: 100px;" class="dropstart border border-warnig nav-back2 rounded mx-2 ">
                        <a class="btn dropdown-toggle fw-bold" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sesión
                        </a>

                        <ul class="dropdown-menu nav-back ">
                            <li class="<?= $userData ? "d-none" : "" ?>"><a class="dropdown-item" href="index.php"><strong>Iniciar sesión</strong></a></li>
                            <li class="<?= $userData ? "" : "d-none" ?>"><a class="dropdown-item" href="acciones/auth_logout.php"><strong>Cerrar sesión</strong></a></li>
                        </ul>
                    </div>



                </ul>
            </div>
        </div>
    </nav>



    <main class="container p-0">




        <?PHP

        require_once file_exists("views/$view.php") ? "views/$view.php" : "views/404.php";

        ?>
        <link href="../css/mycss.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </main>

</body>

<footer class="bg-warning text-dark text-center nav-back">


    <div class="p-2  bg-warning w-100 nav-back border-danger border-top">
        <a href="#" class="d-none d-sm-none d-md-inline"><img src="../img/ig.png" class="d-inline px-5" alt="redes facebook"></a>
        <a href="index.php?sec=yo" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">David Piñeiro 2023</a>
        <a href="#" class="d-none d-sm-none d-md-inline"><img src="../img/twiter.png" class="d-inline px-5" alt="redes facebook"></a>
    </div>
</footer>


</html>