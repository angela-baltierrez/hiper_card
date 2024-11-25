<?php
require_once ('../php/conexion-departamentos.php');

header('Content-Type: application/json');

try {
    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'alto';
    $ordenSQL = ($orden === 'bajo') ? 'ASC' : 'DESC';

    $conn = Cconexion::ConexionBD();
    $query = $conn->prepare("
        SELECT p.id_producto, p.nombre, p.precio, c.nombre AS categoria 
        FROM Productos p
        INNER JOIN Categorias c ON p.id_categoria = c.id_categoria
        ORDER BY p.precio $ordenSQL
    ");
    $query->execute();
    $productos = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($productos);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener los productos: ' . $e->getMessage()]);
}