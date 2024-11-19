<?php
// Incluir el archivo de conexión
include_once("../php/env.php");

// Conexión a la base de datos usando la clase Cconexion
try {
    $conn = Cconexion::ConexionBD();
} catch (Exception $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Procesar formulario de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validar campos
    if (empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    try {
        // Verificar si el usuario existe en la base de datos
        $sql = "SELECT contraseña FROM Clientes WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Comparar contraseñas (para texto plano, usa ===)
            if ($password === $row['contraseña']) {
                echo "Inicio de sesión exitoso.";
                // Redirigir a la página principal
                header("Location: ../../superpagina.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "El usuario no existe.";
        }
    } catch (PDOException $e) {
        echo "Error al consultar la base de datos: " . $e->getMessage();
    }
}

// Cerrar la conexión (opcional con PDO, ya que se cierra automáticamente al finalizar el script)
$conn = null;
?>