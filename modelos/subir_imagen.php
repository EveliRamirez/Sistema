
<?php
require_once "conexion.php"; 


if (isset($_POST["submit"])) {
  
    $conexion = Conexion::conectar();

    
    $rutasActuales = obtenerRutasLogos();

    $logo_mini_nuevo = subirImagen($_FILES["logo_mini"], $rutasActuales['logo_mini']);
    $logo_grande_nuevo = subirImagen($_FILES["logo_grande"], $rutasActuales['logo_grande']);
    $logo_login_nuevo = subirImagen($_FILES["logo_login"], $rutasActuales['logo_login']);
    $fondo_login_nuevo = subirImagen($_FILES["fondo_login"], $rutasActuales['fondo_login']);

    $id = obtenerIdLogos();

    $stmt = $conexion->prepare("UPDATE logos SET logo_mini = ?, logo_grande = ?, logo_login = ?, fondo_login = ? WHERE id = ?");
    $stmt->bindParam(1, $logo_mini_nuevo);
    $stmt->bindParam(2, $logo_grande_nuevo);
    $stmt->bindParam(3, $logo_login_nuevo);
    $stmt->bindParam(4, $fondo_login_nuevo);
    $stmt->bindParam(5, $id);
    $stmt->execute();

    session_start();
    $_SESSION["logo_mini_nuevo"] = $logo_mini_nuevo;
    $_SESSION["logo_grande_nuevo"] = $logo_grande_nuevo;
    $_SESSION["logo_login_nuevo"] = $logo_login_nuevo;
    $_SESSION["fondo_login_nuevo"] = $fondo_login_nuevo;
    header("Location: http://localhost/pos/diseno-logo");
    exit;
}

function obtenerIdLogos() {
    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("SELECT id FROM logos LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['id'];
}

function obtenerRutasLogos() {
    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("SELECT logo_mini, logo_grande, logo_login, fondo_login FROM logos LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

function subirImagen($imagen, $rutaActual) {
    $directorioDestino = "vistas/img/plantillas/"; 

  
    if ($imagen["size"] > 0) {
        $nombreArchivo = uniqid() . '_' . $imagen["name"];
        $rutaCompleta = $directorioDestino . $nombreArchivo;
        
        move_uploaded_file($imagen["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/pos/' . $rutaCompleta);
        return $rutaCompleta;
    } else {
        
        return $rutaActual;
    }
}
  
    ?>