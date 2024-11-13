<?php
$dsn = "mysql:host=localhost;dbname=ximax;charset=utf8";
$usuario = "root";
$contrasena = "";

try {
    $conn = new PDO($dsn, $usuario, $contrasena);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consulta para obtener la contraseña encriptada
        $sql = "SELECT contraseña FROM Clientes WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['contraseña'])) {
            echo "Inicio de sesión exitoso.";
            header("Location: ../superpagina.html"); // Redirige a la página deseada
            exit;
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>