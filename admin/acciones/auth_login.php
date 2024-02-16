<?php
require_once "../../funciones/auto_log.php";

$data_Post = $_POST;

$login = (new Autenticacion())->log_in($data_Post['nombre_usuario'],$data_Post['password']);

if($login){

  if($_SESSION['loggedIn']['rol'] == "usuario"){

    header('location: ../../index.php');

  }else{header('location: ../index.php?sec=dashboard');}

  

}else{

    (new Autenticacion())->log_out();
    header('location: ../index.php?sec=login');
}