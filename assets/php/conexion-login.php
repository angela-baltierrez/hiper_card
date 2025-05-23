<?php
session_start();  // Iniciar sesión para guardar datos

// Incluir el archivo de conexión
include_once("../php/env.php");

// Obtener la conexión
$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validar campos
    if (empty($email) || empty($password)) {
        die("Todos los campos son obligatorios.");
    }

    try {
        // Buscar al usuario por correo electrónico
        $sql = "SELECT nombre_usuario, contraseña FROM Clientes WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["contraseña"])) {
           // Guardar el nombre del usuario en la sesión
            $_SESSION["usuario"] = $user["nombre_usuario"];
            $_SESSION["email"] = $email;

            // Redirigir a departamentos.php
            header("Location: ../../departamentos.php");
            exit();
        } else {
            echo "Correo electrónico o contraseña incorrectos.";
        }   
    } catch (PDOException $e) {
        die("Error al iniciar sesión: " . $e->getMessage());
    }
}
?>