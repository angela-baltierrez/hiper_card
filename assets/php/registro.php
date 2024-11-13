<?php
// Configuración de la conexión
$serverName = "DESKTOP-55DKBTU"; // Puede ser "localhost" o una dirección IP
$connectionOptions = array(
    "Database" => "hiper-card",
    "Uid" => "nombre_de_usuario",
    "PWD" => ""
);

// Conexión a la base de datos
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Registro de usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Validar campos
    if (empty($username) || empty($password) || empty($email)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Hashear la contraseña para mayor seguridad
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO Clientes (cliente_id, nombre_usuario, contraseña, email) VALUES ("",".$username.",".$password.",".$email.")";
    $params = array($username, $hashedPassword, $email);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Registro exitoso.";
        header('Location: ../supernidea.html ');
    }

    // Liberar recursos
    sqlsrv_free_stmt($stmt);
}

// Cerrar la conexión
sqlsrv_close($conn);
?>