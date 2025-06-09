<?php

require_once (__DIR__ . '/env.php'); // Importar la clase de conexión

try {
    // Establecer conexión
    $conn = Cconexion::ConexionBD();

    // Obtener parámetros desde la URL
    $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null; //nuevo px
    $orden = isset($_GET['orden']) ? $_GET['orden'] : null;

    // Construir la consulta base
    $sql = "
        SELECT 
            p.id_producto,
            p.nombre AS nombre_producto,   
            p.id_categoria,     
            c.nombre AS nombre_categoria, 
            p.precio,
            p.stock,
            p.descripcion
        FROM Productos p
        INNER JOIN Categorias c ON p.id_categoria = c.id_categoria
    ";

    
    // Condiciones (nuevo px)
    $condiciones = [];
    $parametros = [];

    if ($categoria) {
        $condiciones[] = "c.nombre = :categoria";
        $parametros[':categoria'] = $categoria;
    }

    if ($busqueda) {
        $condiciones[] = "p.nombre LIKE :busqueda";
        $parametros[':busqueda'] = '%' . $busqueda . '%';
    }

    if (!empty($condiciones)) {
        $sql .= " WHERE " . implode(" AND ", $condiciones);
    }
    //-----------------------------------------------------
    // Ordenar por precio si se ha seleccionado
    if ($orden === 'alto') {
        $sql .= " ORDER BY p.precio DESC";
    } elseif ($orden === 'bajo') {
        $sql .= " ORDER BY p.precio ASC";
    }

    // Preparar y ejecutar la consulta
    $query = $conn->prepare($sql);
    foreach ($parametros as $clave => $valor) {
        $query->bindValue($clave, $valor);
    }
    $query->execute();
    $productos = $query->fetchAll(PDO::FETCH_ASSOC);

    // Si hay una búsqueda, calcular la similitud y ordenar //nuevo PX
    if ($busqueda && !empty($productos)) {
        foreach ($productos as &$producto) {
            similar_text(strtolower($busqueda), strtolower($producto['nombre_producto']), $porcentaje);
            $producto['similitud'] = $porcentaje;
        }
        unset($producto); // Romper la referencia

        // Ordenar los productos por similitud descendente
        usort($productos, function ($a, $b) {
            return $b['similitud'] <=> $a['similitud'];
        });
    }
    
    
   //------------------------------------------------
    $cantidad_productos = count($productos);
} catch (PDOException $e) {
    die("Error al obtener los productos: " . $e->getMessage());
}
?>