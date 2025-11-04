<?php
session_start();
require_once("../../../hiper_card/assets/php/env.php"); // ajusta la ruta si cambia

header('Content-Type: application/json');

try {
    // Conectamos a la base
    $conexion = Cconexion::ConexionBD();

    // Verificamos usuario logueado
    if (!isset($_SESSION["id_usuario"])) {
        echo json_encode(["success" => false, "error" => "Usuario no autenticado"]);
        exit;
    }

    $id_usuario = $_SESSION["id_usuario"];

    // Consulta de compras
    $sql = "
        SELECT 
            V.id_venta,
            V.fecha,
            V.total,
            D.cantidad,
            D.precio_unitario,
            D.subtotal,
            P.nombre AS producto
        FROM Ventas V
        INNER JOIN Detalle_ventas D ON V.id_venta = D.id_venta
        INNER JOIN Productos P ON D.id_producto = P.id_producto
        WHERE V.id_usuario = ?
        ORDER BY V.fecha DESC
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_usuario]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["success" => true, "data" => $resultados]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
