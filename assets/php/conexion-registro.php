<?php

include("../php/env.php"); 

// Obtener la conexión
$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);

    // Validar campos
    if (empty($username) || empty($password) || empty($email) || empty($nombre) || empty($apellido)) {
        die("Todos los campos son obligatorios.");
    }

    // Validar formato de correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no tiene un formato válido.");
    }

    // Hashear la contraseña para mayor seguridad
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ID del rol de cliente (id_rol = 2)
    $rol_cliente = 2;

    try {
        // Consulta SQL segura
        $sql = "INSERT INTO Usuarios (nombre_usuario, contraseña, email, nombre, apellido, id_rol) 
                 VALUES (:username, :password, :email, :nombre, :apellido, :id_rol)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':id_rol', $rol_cliente);

        // Ejecutar la consulta
        $stmt->execute();

   
    // Redirigir después del registro
        header('Location: ../../departamentos.php'); //=>>>>proximo en agregar
        exit();
 
    } catch (PDOException $e) {
        die("Error al registrar el usuario: " . $e->getMessage());
    }
}
?>
