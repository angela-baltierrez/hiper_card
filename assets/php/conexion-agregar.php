<?php

include("../php/env.php"); 

// Obtener la conexión
$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $precio = trim($_POST["precio"]);
    $descripcion = trim($_POST["descripcion"]);
    $stock= trim($_POST["stock"]);
    $imagen = trim($_POST["imagen"]);

    // Validar campos
    if (empty($name_prod) || empty($password) || empty($descripcion) || empty($imagen)){
        die("Todos los campos son obligatorios.");
    }
    // ID del rol de cliente (id_rol = 1)
    $rol_emp = 1;

    try {
        // Consulta SQL segura
        $sql = "INSERT INTO Productos (precio, nombre, stock, descripcion) 
                VALUES (:precio, :name, :stock, :imagen)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':precio', $stock);
        $stmt->bindParam(':email', $imagen);
     

        // Ejecutar la consulta
        $stmt->execute();


    } catch (PDOException $e) {
        die("Error al registrar el usuario: " . $e->getMessage());
    }
}
?>