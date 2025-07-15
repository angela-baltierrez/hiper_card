<?php
session_start();
include_once("env.php");

$conn = Cconexion::ConexionBD();

try {
    $conn->beginTransaction();

    // Insertar en ENVÍOS
    $direccion = $_POST['direccion_envio'] ?? '';
    $telefono = $_POST['telefono_envio'] ?? '';
    $cp = $_POST['cp_envio'] ?? '';

    $sql = "INSERT INTO Envios (direccion, num_telefono, CP) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$direccion, $telefono, $cp]);
    $id_envio = $conn->lastInsertId();

// Obtener el tipo de pago seleccionado
$tipo_pago = $_POST['tipo_pago'] ?? '';

// Buscar el ID del tipo de pago existente
$stmt = $conn->prepare("SELECT id_pago FROM Pagos WHERE Tipo_pago = ?");
$stmt->execute([$tipo_pago]);
$id_pago = $stmt->fetchColumn();

if (!$id_pago) {
    throw new Exception("Tipo de pago no válido o no encontrado.");
}

    // Leer carrito desde POST (JSON)
    $carrito = json_decode($_POST['carrito'] ?? '[]', true);
    $total_compra = 0;

    foreach ($carrito as $item) {
        $cantidad = (int) $item['quantity'];
        $precio_unitario = floatval(preg_replace('/[^0-9.]+/', '', $item['price']));
        $subtotal = $cantidad * $precio_unitario;
        $total_compra += $subtotal;
    }

    // Insertar en VENTAS
    $id_usuario = $_SESSION['id_usuario'] ?? 1;

    $stmt = $conn->prepare("INSERT INTO Ventas (id_usuario, id_envio, id_pago, total) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_usuario, $id_envio, $id_pago, $total_compra]);
    $id_venta = $conn->lastInsertId();

    // Insertar en DETALLE_VENTAS
    $stmt = $conn->prepare("INSERT INTO Detalle_ventas (cantidad, precio_unitario, subtotal, id_venta, id_producto) 
                            VALUES (?, ?, ?, ?, ?)");

    foreach ($carrito as $item) {
        $cantidad = (int) $item['quantity'];
        $precio_unitario = floatval(preg_replace('/[^0-9.]+/', '', $item['price']));
        $subtotal = $cantidad * $precio_unitario;
        $id_producto = (int) $item['id'];

        $stmt->execute([$cantidad, $precio_unitario, $subtotal, $id_venta, $id_producto]);
    }

    $conn->commit();
    echo "Compra registrada con éxito.";

} catch (Exception $e) {
    $conn->rollBack();
    echo "Error al guardar la compra: " . $e->getMessage();
}
?>