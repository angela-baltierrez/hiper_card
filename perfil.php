<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../hiper_card/assets/css/perfil.css">
    <title>Document</title>
</head>

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
        </header>
        <div class="cuerpo-principal">
        <nav class="menu-opciones">
  <ul class="menu-lista">
    <li class="lista-objeto"><a href="#">Inicio</a></li>
    <li class="lista-objeto"> <a onclick="mostrarSeccion('perfil')">Perfil</a></li>
    <li class="lista-objeto"><a onclick="mostrarSeccion('historial')">Historial compras</a></li>
    <li class="lista-objeto"><a onclick="mostrarSeccion('cerrar')">Cerrar sesión</a></li>
  </ul>
        </nav>
    <div id="perfil" class="cuerpo-perfil">

            <img src="../hiper_card/assets/images/icons/panda.png" class="foto-perfil"  alt="logo de la marca"> 
    <div class="perfil-datos">
    <form class="form-datos" method="POST" action="../hiper_card/assets/php/conexion-login.php" autocomplete="on">
        <div class="form-group">
          <label for="email">Corre electronico:</label>
              <div class="input-group">
          <input type="email" id="email" name="email" placeholder="Ingresa tu correo electronico" required autocomplete="username" disabled required autocomplete="username">
           <button type="button" onclick="desbloquear('email', this)">✏️</button>
                </div>
          <label for="password">Contraseña:</label>
          <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required autocomplete="current-password" disabled required autocomplete="current-password">
           <button type="button" onclick="desbloquear('email', this)">✏️</button>
            </div>
          </div>
      </form>
    </div>
    </div>   
    <div id="historial" class="cuerpo-historial-de-compras">
      <form class="form-datos">
      <label>Fecha: 01/10/2025 - Compra #1234</label>
      <label>fecha:</label>
      <label>fecha:</label>
      <label>fecha:</label>
      </form>
    </div>

    <div class="cuerpo-cerra-sesion">

    </div>
        </div>
 

    <script src="../hiper_card/assets/js/perfil.js"></script>

</body>

</html>