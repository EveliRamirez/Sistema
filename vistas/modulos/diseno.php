<?php

require_once "modelos/conexion.php";

function obtenerColores() {
    try {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM colores");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener los colores: " . $e->getMessage();
    }
}


$colores = obtenerColores();


if ($colores) {

    $navbarColor = $colores['navegador'];
    $logoColor = $colores['logo'];
    $sidebarColor = $colores['late'];
    $activeSidebarColor = $colores['activa'];
} else {
   
    $navbarColor = "#012c44";
    $logoColor = "#e8f7ff";
    $sidebarColor = "#00afff";
    $activeSidebarColor = "#04b8ff";
}
?><div class="content-wrapper">
<section class="content-header">
    <h1>Cambio de Diseño</h1>
</section>
<section class="content">
    <!-- Formulario para cambiar colores -->
    
    <form id="color-form" action="modelos/colores.php" method="post" >
        <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Diseño</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cambiar color de la barra de navegación</td>
                    <td>
                        <input type="color" name="navegador" id="navegador-color" value="<?php echo $navbarColor; ?>">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cambiar color del logo</td>
                    <td>
                        <input type="color" name="logo" id="logo-color" value="<?php echo $logoColor; ?>">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cambiar color de la barra lateral</td>
                    <td>
                        <input type="color" name="late" id="lateral-color" value="<?php echo $sidebarColor; ?>">
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Cambiar color de la barra lateral activa</td>
                    <td>
                        <input type="color" name="activa" id="activo-color" value="<?php echo $activeSidebarColor; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" name="submit" class="btn btn-primary">Guardar todos los colores</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

   
   
</section>
</div>





