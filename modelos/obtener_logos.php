<?php
require_once "conexion.php";

class ModeloLogo {
    static public function obtenerLogos() {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("SELECT * FROM logos");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los logos: " . $e->getMessage();
        }
    }
}
?>
