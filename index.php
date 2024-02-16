<?PHP

require_once "funciones/auto_log.php";

$nombre_instrumento = (new Guitarra())->listar_nombre();



$sec_ok = [
    "principal" => [
        "titulo" => "Bienvenidos"
    ],
    "catalogo_completo" => [
        "titulo" => "Catalogo completo"
    ],
    "quien_soy" => [
        "titulo" => "¿Quien Soy?"
    ],
    "gtr" => [
        "titulo" => "Guitarras"
    ],
    "bass" => [
        "titulo" => "Bajos"
    ],
    "instrumento" => [
        "titulo" => "¿quieres ver más?"
    ],
    "catalogo_modelo" => [
        "titulo" => "Este modelo va con vos!"
    ],
    "form_compra" => [
        "titulo" => "Casi es tuyo!"
    ],
    "yo" => [
        "titulo" => "David Piñeiro"
    ],
    "carrito" => [
        "titulo" => "Carrito de compras"
    ],
    "gracias" => [
        "titulo" => "Gracias por tu compra!!!"
    ]
];


$sec = $_GET['sec'] ?? "principal";


if (!array_key_exists($sec, $sec_ok)) {
    $view = "404";
    $titulo = "404 - AHHHHHHHHHHHH";
} else {
    $view = $sec;
    $titulo = $sec_ok[$sec]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;
$userRol = $_SESSION['rol'] ?? FALSE;

if (!$userData == "") {
    if ($userData['rol'] == 'usuario') {

        $resp = 'd-none';
    }
}



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
        <div class="container-fluid">

            <a class="navbar-brand h3 p-0 m-0" href="index.php">Fendardo Music </a>
            <img src="img/logo.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <?php foreach ($nombre_instrumento as $i) {
                        $modelo = (new Guitarra())->listar_modelo($i['nombre']);
                        if ($i['nombre'] == "Guitarra") {
                            $parseSec = "gtr";
                        } elseif ($i['nombre'] == "Bajo") {
                            $parseSec = "bass";
                        }
                    ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-warning rounded  " href="index.php?sec=<?= $parseSec ?>"> <strong><?= $i['nombre'] ?></strong> </a>
                        </li>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu nav-back ">
                                <?php foreach ($modelo as $m) {  ?>
                                    <li><a class="dropdown-item" href="index.php?sec=catalogo_modelo&modelo=<?= $m['modelo'] ?>"><strong><?= $m['modelo'] ?></strong></a></li>
                                <?php } ?>
                            </ul>
                        </div>

                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo_completo"><strong>Catalogo Completo</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=quien_soy"><strong>¿Quien soy?</strong></a>
                    </li>

                    <div style="max-width: 100px;" class="dropstart border border-warnig nav-back2 rounded mx-2 ">
                        <a class="btn dropdown-toggle fw-bold" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sesión
                        </a>

                        <ul class="dropdown-menu nav-back ">
                            <li class="<?= $userData ? "d-none" : "" ?>"><a class="dropdown-item" href="admin/index.php"><strong>Iniciar sesión</strong></a></li>
                            <li class="<?= $userData ? "" : "d-none" ?>"><a class="dropdown-item" href="admin/acciones/auth_logout.php"><strong>Cerrar sesión</strong></a></li>
                            <li class="nav-item dropdown-item <?= $userData ? "" : "d-none" ?> <?= $resp ?> ">
                                <a class="nav-link active" href="admin/index.php?sec=dashboard"><strong>Admin</strong></a>
                                <li class="<?= $userData ? "" : "d-none" ?>"><a class="dropdown-item" href="index.php?sec=carrito"><strong>Carrito</strong><img src="img/carrito.png" alt="iconCarrito" class="mx-3" style="max-width: 25px;"></a></li>
                                
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>  

    <main>

        <?PHP
        require_once file_exists("views/$view.php") ? "views/$view.php" : "views/404.php";
        ?>
        <link href="css/mycss.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </main>

</body>

<footer class="bg-warning text-dark text-center nav-back">


    <div class="p-2  bg-warning w-100 nav-back border-danger border-top">
        <a href="#"><img src="img/ig.png" class="d-inline px-5" alt="redes facebook"></a>
        <a href="index.php?sec=yo" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">David Piñeiro 2023</a>
        <a href="#"><img src="img/twiter.png" class="d-inline px-5" alt="redes facebook"></a>
    </div>
</footer>


</html>