<?php

class Alert
{

    public function add_alerta(string $tipo, string $mensaje)
    {

        $_SESSION['alerta'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    public function clear_alerta()
    {

        $_SESSION['alerta'] = [];
    }



    public function get_alerta()
    {

        if (!empty($_SESSION['alerta'])) {
            $alertasActuales = "";
            foreach ($_SESSION['alerta'] as $alerta) {
                $alertasActuales .= $this->print_alerta($alerta);
            }
            $this->clear_alerta();
            return $alertasActuales;
        } else {
            return null;
        }
    }



    public function print_alerta($alerta): string
    {

        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";

        return $html;
    }
}
