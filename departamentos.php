    <?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>
    <?php 
    require_once ('../hiper_card/assets/php/conexion-departamentos.php'); 
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
        <title>Departamentos</title>
        <link rel="stylesheet" href="../hiper_card/assets/css/departamentos.css">
    
    </head>
    <script src="editar.js"></script>
    <!-- Mini Interfaz Usuario -->
    



<!-- PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP -->

<!-- BURBUJA -->



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">agregar prodcuto:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="POST" action="../hiper_card/assets/php/conexion-agregar.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" id="name" name="nombre">
  </div>

  <div class="mb-3">
    <label for="precio" class="col-form-label">Precio:</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio">
  </div>

  <div class="mb-3">
    <label for="stock" class="col-form-label">Stock:</label>
    <input type="number" class="form-control" id="stock" name="stock">
  </div>

  <div class="mb-3">  <!-- nuevo px 4/6 -->
    <select class="form-select" name="id_categoria" id="id_categoria" required>
  <option value="">-- Selecciona una categoría --</option>
  <?php foreach ($categorias as $categoria): ?>
      <option value="<?= htmlspecialchars($categoria['id_categoria']) ?>"> 
          <?= htmlspecialchars($categoria['nombre']) ?>
      </option>
  <?php endforeach; ?>
</select>
  </div>

  <div class="mb-3">
    <label for="descripcion" class="col-form-label">Descripción:</label>
    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
  </div>

  <div class="mb-3">
    <label for="imagen">Seleccionar imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/*">
  </div>

  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Subir">
  </div>
</form>
      </div>
      <div class="modal-footer">    
      </div>
    </div>
  </div>
</div>


<!-- PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP -->

  <script src="../hiper_card/assets/js/editar.js"></script>
    <body>
        <header class="header">
        <div class="logo">
            <img src="../hiper_card/assets/images/hipercard logo.png" alt="logo de la marca">
        </div>
        <div class="titulo_pagina">
            <a href="superpagina.php"><h4>Hiper-card</h4></a>
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
                    <?php if (isset($_GET['categoria'])): ?> <!-- isset verifica si existe la categoria -->
                        <span class="ruta_separador">
                            <svg fill="none" width="8" height="8" viewBox="0 0 16 16" class="ruta_flecha" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <use href="#nav-caret--right" xlink:href="#nav-caret--right"></use>
                            </svg>
                        </span>

                        <!-- Enlace a la categoría -->
                        <a href="" class="ruta_link">
                            <?php echo htmlspecialchars($_GET['categoria']); ?> <!-- Es una función de PHP que convierte caracteres especiales a entidades HTML -->
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
    <div class="contenido_principal">

    <aside class="aside">
    <div class="barra_departamentos" style="display: flex;">
            <h2>Departamentos</h2>
            <ul style="display: flex;">
                <li><a href="departamentos.php?categoria=snacks">Snacks</a></li>
                <li><a href="departamentos.php?categoria=bebidas">Bebidas</a></li>
                <li><a href="departamentos.php?categoria=carnes">Carne</a></li>
                <li><a href="departamentos.php?categoria=frutas">Fruta</a></li>
                <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
                <li><a href="departamentos.php?categoria=limpieza">Limpieza</a></li>
            </ul>
        </div>
    </aside>
    <div class="ajustar_la_busquedar">
        <div class="producto_cantidad_resultado">
            <p>
            <span class="cantidad_total">
                <?php if (isset($cantidad_productos)): ?>
                    Productos encontrados: <?php echo $cantidad_productos; ?>
                <?php endif; ?>
            </span>
            </p>
            <div>
<?php $orden = $_GET['orden'] ?? ''; ?>
<select class="forma_selecionar" id="ordenarPrecios">
    <option value="" <?php echo ($orden === '') ? 'selected' : ''; ?>>-- Ordenar por --</option>
    <option value="alto" <?php echo ($orden === 'alto') ? 'selected' : ''; ?>>Precio más alto</option>
    <option value="bajo" <?php echo ($orden === 'bajo') ? 'selected' : ''; ?>>Precio más bajo</option>
    <option value="relevante" <?php echo ($orden === 'relevante') ? 'selected' : ''; ?>>Los más relevantes</option>
</select>
            </div>
        </div>

        <div class="productos_cartas_disponible">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="columna">
                        <div class="cuerpo_de_la_carta"> 
                            <div class="cuerpo_carta_imagen">
                                <a href="detalle_producto.php?id=<?php echo $producto['id_producto']; ?>">
                                    <img src="../hiper_card/assets/images/products/<?php echo strtolower(str_replace(' ', '', $producto['nombre_producto'])); ?>.jpg" 
                                        alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
                                </a>
                            </div>
                            <div class="departamentos_pertence">
                                <a href="departamentos.php?categoria=<?php echo urlencode($producto['nombre_categoria']); ?>">
                                    <?php echo htmlspecialchars($producto['nombre_categoria']); ?>
                                </a>
                            </div>
                            <h2 class="nombre_del_producto-h2"><?php echo htmlspecialchars($producto['nombre_producto']); ?></h2>
                            <p class="precio_producto-p">$<?php echo $producto['precio']; ?></p>
                            <button class="btn-add-cart" data-id="<?php echo $producto['id_producto'];?>">Añadir</button>
                            
  <?php if (isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1): ?>
        <!-- espacio-->
<button type="button" class="btn-add-cart" 
  data-bs-target="#editarModal" 
  data-bs-toggle="modal"  
  data-id="<?php echo $producto['id_producto']; ?>"
  data-nombre="<?php echo htmlspecialchars($producto['nombre_producto']); ?>"
  data-precio="<?php echo $producto['precio']; ?>"
  data-stock="<?php echo $producto['stock']; ?>"
  data-nombre_categoria="<?php echo htmlspecialchars($producto['nombre_categoria']); ?>"
  data-id_categoria="<?php echo $producto['id_categoria']; ?>" 
  data-descripcion="<?php echo htmlspecialchars($producto['descripcion']); ?>"
> <!-- ESTE -->    <!-- espacio-->
        <i class="bi bi-pencil"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
        </i>
    </button>
    <script src="editar.js"></script>
    <?php endif; ?>


                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </div>
            <!-- modal-->
 <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">editar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="POST" action="../hiper_card/assets/php/conexion-editar.php" enctype="multipart/form-data">
<input type="hidden" id="producto_id" name="id_producto" value="<?= $producto['id_producto'] ?>">
  <div class="mb-3">
<h2 class="nombre_del_producto-h2" id="modal_nombre_producto"></h2>
<input type="text" class="form-control" id="nombre_producto" name="nombre">
  </div>

  <div class="mb-3">
 <h2 class="nombre_del_producto-h2" id="modal_precio_producto"></h2>
    <input type="number" step="0.01" class="form-control" id="precio_producto" name="precio">
  </div>

  <div class="mb-3">
    <h2 class="nombre_del_producto-h2" id="modal_stock_producto"></h2>
    <input type="number" class="form-control" id="stock_producto" name="stock">
  </div>

  <div class="mb-3">  <!-- nuevo px 4/6 -->
    
    <h2 id="modal_categoria_nombre"></h2>
<select id="categoria_producto" name="categoria_producto" class="form-control">
  <?php foreach ($categorias as $categoria): ?>
    <option value="<?php echo $categoria['id_categoria']; ?>">
      <?php echo htmlspecialchars($categoria['nombre']); ?>
    </option>
  <?php endforeach; ?>
</select>
  </div>

 <div class="mb-3">
    <h2 class="nombre_del_producto-h2" id="modal_descripcion_producto"></h2>
    <textarea class="form-control" id="descripcion_producto" name="descripcion"></textarea>
  </div>


  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Subir">
  </div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
        <!-- espacio-->

    <!-- JavaScript para cambiar el filtro -->
    <script>
    document.getElementById('ordenarPrecios').addEventListener('change', function () {
        const valor = this.value;
        const urlParams = new URLSearchParams(window.location.search);

        if (valor) {
            urlParams.set('orden', valor);
        } else {
            urlParams.delete('orden');
        }

        window.location.search = urlParams.toString();
    });
    </script>
    </div>
    <footer class="footer">
        <div class="contenido_extra">
            <h2 class="titulo_categoria">Categorías</h2>
            <div class="cuadro_extra">
                <div class="categoria_extra">
                    <ul class="lista_categoria">
                        <li><a href="departamentos.php?categoria=snacks">Snacks</a></li>
                        <li><a href="departamentos.php?categoria=bebidas">Bebidas</a></li>
                        <li><a href="departamentos.php?categoria=carnes">Carne</a></li>
                        <li><a href="departamentos.php?categoria=frutas">Fruta</a></li>

                        <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                        <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
                    </ul>
                </div>
                <div class="categoria_extra">
                    <ul class="lista_categoria">
                    <li><a href="departamentos.php?categoria=snacks">Snack</a></li>
                    <li><a href="departamentos.php?categoria=bebidas">Bebida</a></li>
                    <li><a href="departamentos.php?categoria=carnes">Carnes</a></li>
                    <li><a href="departamentos.php?categoria=frutas">Fruta</a></li>
                    <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                    <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </body>
    <script src="../hiper_card/assets/js/departamentos.js"></script>

    </html>