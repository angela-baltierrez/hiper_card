<?php

class Cconexion {

    public static function ConexionBD() {
        $host = 'localhost'; // Cambiar si usas un servidor remoto
<<<<<<< HEAD
        $dbname = 'hiper-card2'; // Nombre de la base de datos
        $username = 'sa'; // Usuario de la base de datos
        $password = '1234'; // Contraseña del usuario
        $servidor = 'DESKTOP-4S5EVQS\SQLEXPRESS'; // Nombre del servidor o dirección IP
=======
        $dbname = 'hiper-card4'; // Nombre de la base de datos
        $username = 'sa'; // Usuario de la base de datos
        $password = '1234'; // Contraseña del usuario
        $servidor = 'DESKTOP-QB22C4J\SQLEXPRESS'; // Nombre del servidor o dirección IP
>>>>>>> ae724c94d40df582f8ce4e0f83cd8e633b1ead72


        try {
            // Establecer conexión usando PDO y SQL Server, pdo se usa para interactual con la base
            $conn = new PDO("sqlsrv:Server=$servidor;Database=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; //permite llamarlo en otras funciones
        } catch (PDOException $exp) {
            die("Error al conectar con la base de datos: " . $exp->getMessage());
        }
    }
}

?>