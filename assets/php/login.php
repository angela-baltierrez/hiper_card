<?php

$serverName = "DESKTOP-55DKBTU"; //ESTO CAMBIALO POR EL NOMBRE DE TU SERVIDOR
$connectionOptions = array(
    "Database" => "hiper-cart",
    "Uid" => "ssmas", //COLOCA EN NOM DE USUARIO (ANTES ERA "ROOT" AHORA NC CREO QUE "sa")
    "PWD" => "hola123",//COLOCA LA CONTRASEÑA PARA ACCEDER AL SERVIDOR (SI NO TIENE DEJALO ASI)
);

// Conexión a la base de datos
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL
    $sql = "SELECT email, contraseña FROM Clientes WHERE email =  '" . $email . "' AND contraseña = '" . $password . "'";
    $params = array($email, $password);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Verificar si hay coincidencias
    if (sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "Inicio de sesión exitoso.";
        header('Location: ../supernidea.html ');
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    // Liberar recursos
    sqlsrv_free_stmt($stmt);
}

// Cerrar la conexión
sqlsrv_close($conn);
?>