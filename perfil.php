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
    <li class="lista-objeto">
      <a href="#">perfil</a>
      <ul class="submenu">
        <li class="lista-objeto"><a href="#">Producto A</a></li>
        <li class="lista-objeto"><a href="#">Producto B</a></li>
      </ul>
    </li>
    <li class="lista-objeto"><a href="#">datos</a></li>
    <li class="lista-objeto"><a href="#">Cerra sesion</a></li>
  </ul>
        </nav>
    <div class="cuerpo-perfil">

            <img src="../hiper_card/assets/images/icons/panda.png" class="foto-perfil"  alt="logo de la marca"> 
    <div class="perfil-datos">
    <form class="form-datos" method="POST" action="../hiper_card/assets/php/conexion-login.php" autocomplete="on">
        <div class="form-group">
          <label for="email">Corre electronico:</label>
          <input type="email" id="email" name="email" placeholder="Ingresa tu correo electronico" required autocomplete="username">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required autocomplete="current-password">
          <a class="link" href="registro.php"> Si no tenes cuenta, haz click aquí </a>
        </div>
      
        <div class="form-group button-class">
          <button id= "submit" type="submit" style="color: #fff;">Iniciar sesion</button>
        </div>
      </form>
    </div>
    
    <div class="cuerpo-datos"></div>
    <div class="cuerpo-cerra-sesion"></div>

    </div>
</body>
</html>