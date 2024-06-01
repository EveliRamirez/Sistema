<?php
require_once "conexion.php";

// Verificar si se ha enviado el formulario
if (isset($_POST["submit"])) {
    // Obtener los datos del formulario
    $navegador_nuevo = $_POST["navegador"] ?? null;
    $logo_nuevo = $_POST["logo"] ?? null;
    $lateral_nuevo = $_POST["late"] ?? null;
    $activo_nuevo = $_POST["activa"] ?? null;

    // Conectar a la base de datos
    $conexion = Conexion::conectar();

    // Obtener las rutas actuales de los colores
    $rutasActuales = obtenerRutasColores();

    // Obtener el ID de los colores
    $id = obtenerIdColores();

    // Preparar y ejecutar la consulta para actualizar los colores en la base de datos
    $stmt = $conexion->prepare("UPDATE colores SET navegador = ?, logo = ?, late = ?, activa = ? WHERE id = ?");
    $stmt->execute([$navegador_nuevo, $logo_nuevo, $lateral_nuevo, $activo_nuevo, $id]);

    // Redirigir al usuario a la página deseada después de procesar el formulario
    header("Location: http://localhost/pos/diseno");
    exit; // Asegúrate de terminar el script para evitar que se ejecute más código
}

// Función para obtener el ID de los colores
function obtenerIdColores() {
    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("SELECT id FROM colores LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['id'];
}

// Función para obtener las rutas de los colores actuales
function obtenerRutasColores() {
    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("SELECT navegador, logo, late, activa FROM colores LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}
?>
