<?php
// Conexión a la base de datos
include_once("env.php");
$conn = Cconexion::ConexionBD();
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->begin_transaction();

try {
    //Insertar en tabla ENVÍOS
    $direccion = $_POST['Dirección'] ?? '';
    $telefono = $_POST['num_telefono'] ?? '';
    $cp = $_POST['CP'] ?? '';

    $stmt = $conn->prepare("INSERT INTO Envios (Dirección, num_telefono, CP) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $direccion, $telefono, $cp);
    $stmt->execute();
    $id_envio = $stmt->insert_id;
    $stmt->close();

    //Insertar en tabla PAGOS
    $tipo_pago = $_POST['Tipo_pago'] ?? '';

    $stmt = $conn->prepare("INSERT INTO Pagos (Tipo_pago) VALUES (?)");
    $stmt->bind_param("s", $tipo_pago);
    $stmt->execute();
    $id_pago = $stmt->insert_id;
    $stmt->close();

    //Calcular el TOTAL desde el carrito
    $carrito = json_decode($_POST['carrito'] ?? '[]', true);
    $total_compra = 0;

    foreach ($carrito as $item) {
        $cantidad = (int) $item['quantity'];
        $precio_unitario = floatval(preg_replace('/[^0-9.]+/', '', $item['price']));
        $subtotal = $cantidad * $precio_unitario;
        $total_compra += $subtotal;
    }

    //Insertar en tabla VENTAS
    session_start();
    $id_usuario = $_SESSION['id_usuario'] ?? 1; // Por ahora asumimos ID 1 si no está logueado

    $stmt = $conn->prepare("INSERT INTO Ventas (id_usuario, id_envio, id_pago, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $id_usuario, $id_envio, $id_pago, $total_compra);
    $stmt->execute();
    $id_venta = $stmt->insert_id;
    $stmt->close();

    // Insertar en DETALLE_VENTAS
    $stmt = $conn->prepare("INSERT INTO Detalle_ventas (cantidad, precio_unitario, total, id_venta, id_producto) VALUES (?, ?, ?, ?, ?)");

    foreach ($carrito as $item) {
        $cantidad = (int) $item['quantity'];
        $precio_unitario = floatval(preg_replace('/[^0-9.]+/', '', $item['price']));
        $subtotal = $cantidad * $precio_unitario;
        $id_producto = (int) $item['id']; // asegurate de tener este campo en tu carritooo

        $stmt->bind_param("iddii", $cantidad, $precio_unitario, $subtotal, $id_venta, $id_producto);
        $stmt->execute();
    }

    $stmt->close();
    $conn->commit();

    echo "Compra registrada con éxito.";

} catch (Exception $e) {
    $conn->rollback();
    echo "Error al guardar la compra: " . $e->getMessage();
}

$conn->close();
?>
