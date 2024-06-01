<?php
require_once "controladores/plantilla.controladores.php";
require_once "controladores/usuarios.controladores.php";
require_once "controladores/categorias.controladores.php";
require_once "controladores/productos.controladores.php";
require_once "controladores/clientes.controladores.php";
require_once "controladores/ventas.controladores.php";


require_once "modelos/categorias.modelos.php";
require_once "modelos/clientes.modelos.php";
require_once "modelos/productos.modelos.php";
require_once "modelos/usuarios.modelos.php";
require_once "modelos/ventas.modelos.php";
require_once "modelos/subir_imagen.php";
require_once "modelos/colores.php";



$plantilla = new ControladorPlantilla();


$plantilla -> ctrPlantilla();

