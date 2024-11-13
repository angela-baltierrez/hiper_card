<?php
try {
    // Ajuste del DSN para la conexión a MySQL
    $dsn = "mysql:host=DESKTOP-RIVIFEH;dbname=hiper-card;charset=utf8";
    $usuario = "sa"; // Usuario de MySQL (por defecto en XAMPP es "root")
    $contrasena = "1234"; // Contraseña de MySQL (por defecto en XAMPP es vacía)

    // Crear la conexión PDO
    $conn = new PDO($dsn, $usuario, $contrasena);

    // Configurar PDO para mostrar errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
