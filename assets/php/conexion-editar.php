<?php
include("../php/env.php"); 
$conn = Cconexion::ConexionBD();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id_producto"]);
    $nombre = trim($_POST["nombre"]);
    $precio = floatval($_POST["precio"]);
    $stock = intval($_POST["stock"]);
    $descripcion = trim($_POST["descripcion"]);
    $id_categoria = intval($_POST["categoria_producto"]);


    try {
        // 1. Obtener nombre anterior
        $sql_old = "SELECT nombre FROM Productos WHERE id_producto = :id";
        $stmt_old = $conn->prepare($sql_old);
        $stmt_old->bindParam(":id", $id);
        $stmt_old->execute();
        $producto_antiguo = $stmt_old->fetch(PDO::FETCH_ASSOC);

        if ($producto_antiguo) {
            $nombre_anterior = strtolower(str_replace(' ', '', $producto_antiguo["nombre"]));
            $nombre_nuevo_limpio = strtolower(str_replace(' ', '', $nombre));

            $directorio = "../images/products/";
            $extensiones = ['jpg', 'png', 'jpeg', 'webp'];

            // 2. Buscar y renombrar la imagen si existe
            foreach ($extensiones as $ext) {
                $archivo_antiguo = $directorio . $nombre_anterior . '.' . $ext;
                $archivo_nuevo = $directorio . $nombre_nuevo_limpio . '.' . $ext;

                if (file_exists($archivo_antiguo)) {
                    rename($archivo_antiguo, $archivo_nuevo);
                    break;
                }
            }
        }

        // 3. Actualizar en la base de datos
        $sql = "UPDATE Productos 
                SET nombre = :nombre,
                    precio = :precio,
                    stock = :stock,
                    descripcion = :descripcion,
                    id_categoria = :id_categoria
                WHERE id_producto = :id_producto";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock); 
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':id_producto', $id);

        
        $stmt->execute();
        header("Location: ../../departamentos.php?mensaje=actualizado");
        exit;
    } catch (PDOException $e) {
        die("Error al actualizar el producto: " . $e->getMessage());
    }
}
?>