<?php
// Incluir el archivo de conexión a la base de datos
require_once "conexion.php";

// Función para obtener los colores desde la base de datos
function obtenerColores() {
    try {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM colores");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error al obtener los colores: " . $e->getMessage();
    }
}

// Función para generar el CSS dinámico
function generarCSS() {
    // Obtener los colores desde la base de datos
    $colores = obtenerColores();

    // Comprobar si se obtuvieron los colores correctamente
    if ($colores) {
        // Extraer los valores de los colores
        $navbarColor = $colores['navegador'];
        $logoColor = $colores['logo'];
        $sidebarColor = $colores['late'];
        $activeSidebarColor = $colores['activa'];

        // Generar el CSS dinámico
        $css = "
        .skin-blue .main-header .navbar {
            background-color: $navbarColor;
        }
        
        .skin-blue .main-header .logo {
            background-color: $logoColor;
        }
        
        .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
            background-color: $sidebarColor;
        }
        
        .skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
            color: #fff;
            background: $activeSidebarColor;
        }
        ";

        // Establecer el encabezado Content-Type como texto/css
        header("Content-type: text/css");

        // Imprimir el CSS generado
        echo $css;
    } else {
        // En caso de error al obtener los colores, imprimir un mensaje de error
        echo "/* Error al obtener los colores */";
    }
}

// Llamar a la función para generar el CSS dinámico
generarCSS();
?>
