<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

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

<?php 
        require_once ('../hiper_card/assets/php/conexion-categorias.php'); 
  ?>

<?php
// Antes del foreach de productos:
$categoriasQuery = $conn->query("SELECT id_categoria, nombre FROM Categorias");
$categorias = $categoriasQuery->fetchAll(PDO::FETCH_ASSOC);
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
    <form class="search_box" method="get" action="departamentos.php"> <!-- nuevo PX-->
        <input type="search" name="busqueda" placeholder="Buscar producto" aria-label="Buscar">
        <button class="btnbuscar" type="submit" >Buscar</button>
    </form>
             <div class="container-icon">
            <div class="container-cart-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                <div class="count-products">
                    <span id="contador-productos">0</span>
                </div>
            </div>

            <div class="container-cart-products hidden-cart">
                <div class="row-product hidden">
                    <div class="cart-product">
                        <div class="info-cart-product">
                            <span class="cantidad-producto-carrito">1</span>
                            <p class="titulo-producto-carrito">producto_ejemplo</p>
                            <span class="precio-producto-carrito">$80</span>
                        </div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="icon-close"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </div>
                </div>

                <div class="cart-total hidden">

                <h3>Total:</h3>
                    <span class="total-pagar">$0</span>
                    
                     <button id="btn-comprar" class="btn-comprar">Comprar</button>
                </div>
                <p class="cart-empty">El carrito está vacío</p>
            </div>
        </div>
 <nav>
         <ul class="nav-link">
                
  <?php if (isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        
    <button type="button" onclick="modal1.js" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@">AGREGAR PRODUCTO</button>
    <script src="modal1.js"></script>

    <?php endif; ?>

                <a class="perfil" id="btn-perfil" href="../hiper_card/perfil.php" ><?php echo htmlspecialchars($_SESSION["usuario"]); ?> </a>  <!-- nombre del cuenta -->
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
                 <button class="button_comprar" data-id="<?php echo $id_producto; ?>">agregar</button>
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
 <script src="../hiper_card/assets/js/departamentos.js"></script>
</html>