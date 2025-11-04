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
        $sql = "SELECT id_usuario, nombre_usuario, contraseña, id_rol, nombre, apellido FROM Usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if ($user && password_verify($password, $user["contraseña"])) {
            // Guardar información en sesión
            $_SESSION["id_usuario"] = $user["id_usuario"];
            $_SESSION["usuario"] = $user["nombre_usuario"];
            $_SESSION["email"] = $email;
            $_SESSION["id_rol"] = $user["id_rol"];
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["apellido"] = $user["apellido"];

            // Redirigir a la página principal
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
