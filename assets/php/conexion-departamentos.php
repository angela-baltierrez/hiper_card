<?php

require_once (__DIR__ . '/env.php'); // Importar la clase de conexión

try {
    // Establecer conexión
    $conn = Cconexion::ConexionBD();

    // Obtener la categoría seleccionada desde la URL
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

    // la consulta inicia SQL
    $sql = "
        SELECT 
            p.nombre AS nombre_producto,   
            c.nombre AS nombre_categoria, 
            p.precio 
        FROM Productos p
        INNER JOIN Categorias c ON p.id_categoria = c.id_categoria
    "; // p = productos y c = categorias

    // Filtrar por categoría si se proporciona
    if ($categoria) {
        $sql .= " WHERE c.nombre = :categoria";
    }
    //prepara la consulta SQL para su ejecución
    $query = $conn->prepare($sql);

    // pasar el valor de la categoría a la consulta si es nece
    if ($categoria) {
        $query->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    }

    $query->execute(); // lo ejectuta
    $productos = $query->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
    $cantidad_productos = count($productos); // Contar la cantidad de productos
} catch (PDOException $e) {
    die("Error al obtener los productos: " . $e->getMessage());
}
?>