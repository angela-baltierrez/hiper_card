<?php
require_once(__DIR__ . '/env.php');
session_start();

try {
    $conn = Cconexion::ConexionBD();
    $conn->beginTransaction();

    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_pago = $_POST['tipo_pago'];
    $carrito = json_decode($_POST['carrito'], true);
    $id_usuario = $_SESSION['id_usuario'] ?? 1; // Temporal: cambiar por sesión real

    // 1. Insertar tipo de pago
    $stmtPago = $conn->prepare("INSERT INTO Pagos (Tipo_pago) VALUES (?)");
    $stmtPago->execute([$tipo_pago]);
    $id_pago = $conn->lastInsertId();

    // 2. Insertar en Envios (fijo por ahora)
    $stmtEnvio = $conn->prepare("INSERT INTO Envios (Dirección, num_telefono, CP) VALUES (?, ?, ?)");
    $stmtEnvio->execute(["Dirección de ejemplo", 123456789, 1000]);
    $id_envio = $conn->lastInsertId();

    // 3. Insertar en Ventas
    $stmtVenta = $conn->prepare("INSERT INTO Ventas (id_usuario, id_envio, id_pago, total) VALUES (?, ?, ?, 0)");
    $stmtVenta->execute([$id_usuario, $id_envio, $id_pago]);
    $id_venta = $conn->lastInsertId();

    $totalVenta = 0;

    // 4. Insertar en Detalle_ventas
    foreach ($carrito as $item) {
        $titulo = $item['title'];
        $cantidad = $item['quantity'];
        $precio_unitario = floatval(str_replace('$', '', $item['price']));
        $subtotal = $cantidad * $precio_unitario;
        $totalVenta += $subtotal;

        // Obtener id_producto por nombre
        $stmtProducto = $conn->prepare("SELECT id_producto FROM Productos WHERE nombre = ?");
        $stmtProducto->execute([$titulo]);
        $id_producto = $stmtProducto->fetchColumn();

        // Insertar detalle
        $stmtDetalle = $conn->prepare("INSERT INTO Detalle_ventas (id_venta, id_producto, cantidad, precio_unitario, total) VALUES (?, ?, ?, ?, ?)");
        $stmtDetalle->execute([$id_venta, $id_producto, $cantidad, $precio_unitario, $subtotal]);

        // Descontar stock
        $conn->prepare("UPDATE Productos SET stock = stock - ? WHERE id_producto = ?")
             ->execute([$cantidad, $id_producto]);
    }

    // 5. Actualizar total de la venta
    $conn->prepare("UPDATE Ventas SET total = ? WHERE id_venta = ?")
         ->execute([$totalVenta, $id_venta]);

    $conn->commit();

    echo "✅ ¡Compra realizada con éxito!";
} catch (PDOException $e) {
    $conn->rollBack();
    echo "❌ Error al procesar la compra: " . $e->getMessage();
}
?>