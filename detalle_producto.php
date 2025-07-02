<?php
require_once('../hiper_card/assets/php/conexion-departamentos.php');

try {
    // Verifica si se proporcionó el ID del producto en la URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        throw new Exception("ID del producto no proporcionado.");
    }

    // Obtén el ID del producto
    $id_producto = $_GET['id'];

    // Consulta SQL para obtener los detalles del producto
    $sql = "
        SELECT 
            p.nombre AS nombre_producto,
            c.nombre AS nombre_categoria,
            p.precio,
            p.descripcion
        FROM Productos p
        INNER JOIN Categorias c ON p.id_categoria = c.id_categoria
        WHERE p.id_producto = :id_producto
    ";

    $query = $conn->prepare($sql); //prepara
    $query->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $query->execute();
    
    // Obtiene el resultado
    $producto = $query->fetch(PDO::FETCH_ASSOC);
    
    // Verifica si se encontró el producto
    if (!$producto) {
        throw new Exception("Producto no encontrado.");
    }

    // Generar el nombre base del producto (sin espacios, en minúsculas)
    $nombre_base = strtolower(str_replace(' ', '', $producto['nombre_producto']));

    // Directorio donde se almacenan las imágenes
    $directorio = "../hiper_card/assets/images/products/";

    // Buscar imágenes adicionales dinámicamente
    $imagenes_adicionales = [];
    for ($i = 2; $i <= 4; $i++) { // Máximo de 4 imágenes adicionales
        $imagen_path = $directorio . $nombre_base . $i . ".jpg";
        if (file_exists($imagen_path)) {
            $imagenes_adicionales[] = $nombre_base . $i . ".jpg";
        }
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($producto['nombre_producto']); ?></title>
    <link rel="stylesheet" href="../hiper_card/assets/css/detalle_producto.css">
</head>
<body>
    <header class="header">
     <div class="logo">
         <img src="../hiper_card/assets/images/hipercard logo.png" alt="logo de la marca">
     </div>
     <div class="titulo_pagina">
        <a href="../hiper_card/superpagina.php"><h2>Hiper-card</h2></a>
     </div>
     <div class="search_box">
         <input class="" type="search" placeholder="Search for product" aria-label="Search">
         <button class="" type="submit">Buscar</button>
     </div>
     <nav>
         <ul class="nav-link">
             <li><a href="lista_favoritos"></a>elpepe</li>
             <li><a href="perfil"></a>perfil</li>
             <li><a href="lista_productos"></a>carrito</li>
         </ul>
     </nav>
    </header>
    <div class="mani">
    <nav class="nav-opciones-categorias">
     <ul class="nav-link-lista">
         <li class="nav-link-departamentos">
             <a href="#">Departamentos
                 <span class="icono-lista">
 
                 </span>
             </a>
             <ul class="nav-menu">
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=snacks">Snack</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=bebidas">Bebida</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=carne">Carne</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=fruta">Fruta</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=limpieza">Limpieza</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                 <li class="nav-menu-opciones"><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
             </ul>
         </li>
     </ul>  
 </nav>
 </div>

<div class="direccion_departamentos">
 <section class="direccion_departamentos_seleccion">
        <div class="ruta">
            <div class="ruta_item">
                    <!-- Enlace al inicio -->
                    <a href="../hiper_card/superpagina.php" class="ruta_link" aria-label="Home">
                        <svg fill="none" width="26" height="14" viewBox="0 0 16 16" class="ruta_icono" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <use href="#nav-home" xlink:href="#nav-home"></use>
                        </svg>
                        <span>home /</span>
                    </a>

                    <!-- Separador -->
                    <?php if ($producto): ?>
                        <span class="ruta_separador">
                            <svg fill="none" width="8" height="8" viewBox="0 0 16 16" class="ruta_flecha" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <use href="#nav-caret--right" xlink:href="#nav-caret--right"></use>
                            </svg>
                        </span>

                        <!-- Enlace a la categoría -->
                        <a href="departamentos.php?categoria=<?php echo urlencode($producto['nombre_categoria']);?>" class="ruta_link">
                            <?php echo htmlspecialchars($producto['nombre_categoria']); ?> /
                        </a>

                        <!-- Separador -->
                        <span class="ruta_separador">
                            <svg fill="none" width="8" height="8" viewBox="0 0 16 16" class="ruta_flecha" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <use href="#nav-caret--right" xlink:href="#nav-caret--right"></use>
                            </svg>
                        </span>

                        <!-- Nombre del producto -->
                        <span class="ruta_nombre_producto">
                            <?php echo htmlspecialchars($producto['nombre_producto']); ?>
                        </span>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
     <div>
         <seletion class="producto_informacion">
         <div class="paraproducto">
            <div class="paraminiproducto">
                <div class="separacionminiproducto">
                    <img class="imagen_click" 
                         src="../hiper_card/assets/images/products/<?php echo $nombre_base; ?>.jpg" 
                         alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" 
                         width="100px" height="100px" 
                         onclick="cambiarFoto(this)">
                </div>
                <?php foreach ($imagenes_adicionales as $imagen): ?> <!-- acá hara un bucle de todas mini imagenes que tenga ese productos -->
                    <div class="separacionminiproducto">
                        <img class="imagen_click" 
                             src="../hiper_card/assets/images/products/<?php echo $imagen; ?>" 
                             alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" 
                             width="100px" height="100px" 
                             onclick="cambiarFoto(this)">
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="para_la_foto">
                <img id="foto_seleccionada" 
                     src="../hiper_card/assets/images/products/<?php echo $nombre_base; ?>.jpg" 
                     alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" 
                     width="500px" height="500px">
            </div>
         <div class="para_la_informacion">
             <div class="para_la_informacion_titulo"><h1><?php echo htmlspecialchars($producto['nombre_producto']); ?></h1></div>
                 <div class="para_la_informacion_precio"><h1>Precio: $<?php echo $producto['precio']; ?></h1></div>
                 <button class="button_comprar">agregar</button>
                 <div class="descripcion_texto"><p>descripcion:</p></div>
                 <div class="para_la_informacion_descripcion"><p><?php echo htmlspecialchars($producto['descripcion']); ?></p></div>
         </div>
       </div>
     </seletion>
     </div>

<footer class="footer">
    <div class="contenido_extra">
        <h2 class="titulo_categoria">Categorías</h2>
        <div class="cuadro_extra">
            <div class="categoria_extra">
                <ul class="lista_categoria">
                    <li><a href="departamentos.php?categoria=snacks">Snack</a></li>
                    <li><a href="departamentos.php?categoria=bebidas">Bebida</a></li>
                    <li><a href="departamentos.php?categoria=carne">Carne</a></li>
                    <li><a href="departamentos.php?categoria=fruta">Fruta</a></li>
                    <li><a href="departamentos.php?categoria=limpieza">Limpieza</a></li>
                    <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                    <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
                </ul>
            </div>
            <div class="categoria_extra">
                <ul class="lista_categoria">
                    <li><a href="departamentos.php?categoria=snacks">Snack</a></li>
                    <li><a href="departamentos.php?categoria=bebidas">Bebida</a></li>
                    <li><a href="departamentos.php?categoria=carne">Carne</a></li>
                    <li><a href="departamentos.php?categoria=fruta">Fruta</a></li>
                    <li><a href="departamentos.php?categoria=limpieza">Limpieza</a></li>
                    <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                    <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
 </body>
 <script src="../hiper_card/assets/js/cambiarFoto.js"></script>   
</html>