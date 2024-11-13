<?php
include("env.php"); // Esto asume que la conexión PDO se establece aquí

// Verificar si la conexión fue exitosa
if ($conn === false) {
    die("No se conectó a la base de datos. Error: " . $e->getMessage());
}

// Obtener datos del formulario
$nombre_usuario = $_POST['name'];  // Cambiado a 'name' para coincidir con el formulario HTML
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para insertar el registro
$sql = "INSERT INTO Clientes (nombre_usuario, contraseña, email) VALUES (?, ?, ?)";

try {
    // Preparar la consulta utilizando PDO
    $stmt = $conn->prepare($sql);

    // Ejecutar la consulta con los parámetros
    $stmt->execute([$nombre_usuario, $password, $email]);

    echo "Registro exitoso";
    header("Location: ../hiper_card/superpagina.html"); // Cambia la redirección según tu estructura de proyecto
    exit; // Asegura que se detiene el script después de la redirección
} catch (PDOException $e) {
    // Mostrar el error si falla la inserción
    die("Error al registrar: " . $e->getMessage());
}

// No es necesario cerrar la conexión explícitamente en PDO, se cierra automáticamente cuando el script termina
?>