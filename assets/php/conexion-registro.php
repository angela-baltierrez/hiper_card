<?php

include("../php/env.php"); 

// Obtener la conexión
$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);

    // Validar campos
    if (empty($username) || empty($password) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    // Validar formato de correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no tiene un formato válido.");
    }

    // Hashear la contraseña para mayor seguridad
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Consulta SQL segura
        $sql = "INSERT INTO Clientes (nombre_usuario, contraseña, email) VALUES (:username, :password, :email)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Registro exitoso.";
        header('Location: ../../superpagina.php');
        exit();

    } catch (PDOException $e) {
        die("Error al registrar el usuario: " . $e->getMessage());
    }
}
?>