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
      
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Departamentos</title>
        <link rel="stylesheet" href="../hiper_card/assets/css/departamentos.css">
    
    </head>
    <!-- Mini Interfaz Usuario -->
    <div id="mini-perfil" style="display: none; position: absolute; top: 70px; right: 20px; background: white; border: 1px solid #ccc; border-radius: 10px; padding: 20px; width: 250px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 999;">
    <h3>Tu perfil</h3>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION["usuario"]); ?></p>
    <p><strong>Email:</strong> <?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : 'no-email@ejemplo.com'; ?></p>
    <p>
        <strong>Contraseña:</strong> 
        <span id="password-text">********</span>
        <button type="button" onclick="togglePassword()">👁️</button>
    </p>
    <form action="../hiper_card/assets/php/logouts.php" method="post">
        <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; border-radius: 5px;">Cerrar sesión</button>
    </form>
</div>





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
        <form method="POST" action="../hiper_card/assets/php/conexion-agregar.php">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">nombre:</label>
            <input type="text" class="form-control" id="name"  name="nombre">
          </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">precio:</label>
            <input type="number" class="form-control" id="precio"  name="precio">
          </div>
             <div class="mb-3">
            <label for="recipient-name" class="col-form-label">stock:</label>
            <input type="number" class="form-control" id="stock"  name="stock">
          </div>
           <select name="mi-lista" id="mi-lista">
            <option value="valor1">Opción 1</option>
            <option value="valor2">Opción 2 (Predeterminada)</option>
            <option value="valor3">Opción 3</option>
         </select>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">descripcion:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
          </div>
            <label for="imagen">Seleccionar imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
            
        </form>
      </div>
      <div class="modal-footer">
    
         <input type="submit" value="Subir">
      </div>
    </div>
  </div>
</div>


<!-- PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP -->


    <body>
        <header class="header">
        <div class="logo">
            <img src="../hiper_card/assets/images/hipercard logo.png" alt="logo de la marca">
        </div>
        <div class="titulo_pagina">
            <a href="superpagina.html"><h2>Hiper-card</h2></a>
        </div>
        
    <form class="search_box" method="get" action="departamentos.php"> <!-- nuevo PX-->
        <input type="search" name="busqueda" placeholder="Buscar producto" aria-label="Buscar">
        <button type="submit">Buscar</button>
    </form>
        <div class="container-icon">
            <div class="container-cart-icon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="icon-cart"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                    />
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
                </div>
                <p class="cart-empty">El carrito está vacío</p>
            </div>
        </div>
        <nav>
            <ul class="nav-link">
                
  <?php if (isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        
    <button type="button" onclick="modal1.js" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@">Open modal for @NIGGER</button>
    <script src="modal1.js"></script>

    <?php endif; ?>

                <li id="btn-perfil" style="cursor: pointer;"><?php echo htmlspecialchars($_SESSION["usuario"]); ?></li>  <!-- nombre del cuenta -->
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
                    <li class="nav-menu-opciones"><a href="departamentos.php?categoria=snacks">Snacks</a></li>
                    <li class="nav-menu-opciones"><a href="departamentos.php?categoria=bebidas">Bebidas</a></li>
                    <li class="nav-menu-opciones"><a href="departamentos.php?categoria=carne">Carne</a></li>
                    <li class="nav-menu-opciones"><a href="departamentos.php?categoria=fruta">Fruta</a></li>
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
    <div class="barra_departamentos">
            <h2>Departamentos</h2>
            <ul>
                <li><a href="departamentos.php?categoria=snacks">Snacks</a></li>
                <li><a href="departamentos.php?categoria=bebidas">Bebidas</a></li>
                <li><a href="departamentos.php?categoria=carne">Carne</a></li>
                <li><a href="departamentos.php?categoria=fruta">Fruta</a></li>
                <li><a href="departamentos.php?categoria=lacteos">Lácteos</a></li>
                <li><a href="departamentos.php?categoria=golosinas">Golosinas</a></li>
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
                <select class="forma_selecionar" id="ordenarPrecios">
                    <option value="alto" <?php echo (isset($_GET['orden']) && $_GET['orden'] === 'alto') ? 'selected' : ''; ?>>Precio más alto</option>
                    <option value="bajo" <?php echo (isset($_GET['orden']) && $_GET['orden'] === 'bajo') ? 'selected' : ''; ?>>Precio más bajo</option>
                    <option value="" <?php echo (!isset($_GET['orden']) || $_GET['orden'] == '') ? 'selected' : ''; ?>>Los más relevantes</option>
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
                            <button class="btn-add-cart">Añadir</button>
                            
  <?php if (isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1): ?>

        
    <button class="btn-add-cart"> 
        <i class="bi bi-pencil"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
        </i>
    </button>

    <?php endif; ?>


                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </div>

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
                        <li><a href="departamentos.php?categoria=carne">Carne</a></li>
                        <li><a href="departamentos.php?categoria=fruta">Fruta</a></li>

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