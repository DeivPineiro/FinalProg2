<?php

class Autenticacion
{


    public function log_in(string $nombre_usuario, string $password): ?bool
    {


        $datosUsuario = (new Usuarios())->usuario_x_username($nombre_usuario);


        if ($datosUsuario) {

            if (password_verify($password, $datosUsuario->getPassword())) {

                $datosLogin['nombre_usuario'] = $datosUsuario->getNombre_usuario();
                $datosLogin['id_usuario'] = $datosUsuario->getId_usuario();
                $datosLogin['rol'] = $datosUsuario->getRol();


                $_SESSION['loggedIn'] = $datosLogin;


                return TRUE;
            } else {

                (new Alert())->add_alerta('danger', "Password incorrecto >=(");

                return FALSE;
            }
        } else {
            (new Alert())->add_alerta('warning', "Usuario no registrado ?=(");
            return NULL;
        }
    }


    public function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {

            unset($_SESSION['loggedIn']);
        }
    }


    public function verificar(): bool
    {



        if (isset($_SESSION['loggedIn'])) {


            return TRUE;
        } else {

            header('location: index.php?sec=login');
        }
    }
}
