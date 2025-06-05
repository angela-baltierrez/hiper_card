<?php
require_once (__DIR__ . '/env.php'); // conexión PDO

try {
    $conn = Cconexion::ConexionBD();

    $sql = "SELECT id_categoria, nombre FROM Categorias ORDER BY nombre";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al obtener categorías: " . $e->getMessage());
}
?>