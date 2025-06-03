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

    // ID del rol de cliente (id_rol = 1)
    $rol_emp = 1;

    try {
        // Consulta SQL segura
        $sql = "INSERT INTO Usuarios (nombre_usuario, contraseña, email, id_rol) 
                VALUES (:username, :password, :email, :id_rol)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_rol', $rol_emp);

        // Ejecutar la consulta
        $stmt->execute();
 if ($user && password_verify($password, $user["contraseña"])) {

      $_SESSION["id_rol"] = $user["id_rol"];  // Guardamos el rol

    // Redirigir después del registro
        header('Location: ../../departamentos.php'); //=>>>>proximo en agregar
        exit();
 }

    

    } catch (PDOException $e) {
        die("Error al registrar el usuario: " . $e->getMessage());
    }
}
?>
