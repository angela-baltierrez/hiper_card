<?php

include("../php/env.php"); 

$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $name = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);
    $descripcion = trim($_POST["descripcion"]);
    $stock = trim($_POST["stock"]);

    // Validar campos
    if (empty($name) || empty($precio) || empty($descripcion) || empty($stock)) {
        die("Todos los campos son obligatorios.");
    }

    // Manejo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Obtener la extensión del archivo
        $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);

        // Limpiar el nombre del producto para usarlo como nombre de archivo
        $nombreImagen = preg_replace('/[^a-zA-Z0-9_-]/', '_', strtolower($name)) . '.' . $extension;

        // Ruta destino
        $rutaDestino = "../images/products/" . $nombreImagen;

        // Mover el archivo
        if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
            die("Error al guardar la imagen en el servidor.");
        }
    } else {
        die("Error al subir la imagen.");
    }

    // Guardar el producto en la base de datos (sin guardar imagen)
    try {
        $sql = "INSERT INTO Productos (precio, nombre, stock, descripcion, id_categoria) 
                VALUES (:precio, :nombre, :stock, :descripcion, :categoria)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':nombre', $name);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':descripcion', $descripcion);

        // Si usas una lista desplegable para seleccionar la categoría:
        $categoria = isset($_POST['mi-lista']) ? intval($_POST['mi-lista']) : 1;
        $stmt->bindParam(':categoria', $categoria);

        $stmt->execute();

        echo "Producto registrado correctamente.";

    } catch (PDOException $e) {
        die("Error al registrar el producto: " . $e->getMessage());
    }
}
?>