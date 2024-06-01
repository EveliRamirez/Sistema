<?php

require_once "../../controladores/ventas.controladores.php";
require_once "../../modelos/ventas.modelos.php";
require_once "../../controladores/clientes.controladores.php";
require_once "../../modelos/clientes.modelos.php";
require_once "../../controladores/usuarios.controladores.php";
require_once "../../modelos/usuarios.modelos.php";

$reporte = new ControladorVentas();
$reporte -> ctrDescargarReporte();