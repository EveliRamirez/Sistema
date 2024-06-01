<?php
require_once "modelos/conexion.php"; 


$logo_mini = obtenerRutaLogo('logo_mini');

$logo_grande = obtenerRutaLogo('logo_grande');

function obtenerRutaLogo($tipo) {
    $conexion = Conexion::conectar();


    $consulta = "SELECT $tipo FROM logos";
    $resultado = $conexion->query($consulta);

    if ($resultado->rowCount() > 0) {
        
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila[$tipo];
    } else {
       
        return 'vistas/img/plantillas/logo2.png'; 
    }
}
?>
<header class="main-header">
    <!--logotipo de la pagina -->
    <a href="https://example.com" class="logo">
        <!--logo mini-->
        <span class="logo-mini">
            <img src="<?php echo $logo_mini; ?>" alt="Logo Mini" class="img-responsive" style="padding:10px">
        </span>
        <!--logo normal-->
        <span class="logo-lg">
            <img src="<?php echo $logo_grande; ?>" class="img-responsive" style="padding:10px 0px" alt="Logo Normal">
        </span>
    </a>
    <!-- BARRA DE NAVEGACION-->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
        <!--PERFIL -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
