<?php

require_once "../../funciones/auto_log.php";

(new Autenticacion())->log_out();

header('location: ../index.php?sec=login');