<?php
session_start();

// Verificar si hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Incluir conexión con la ruta correcta
require_once("assets/php/env.php");
$conn = Cconexion::ConexionBD();

// Obtener datos del usuario logueado
$id_usuario = $_SESSION["id_usuario"];
$stmt = $conn->prepare("SELECT email, nombre, apellido, foto_perfil FROM Usuarios WHERE id_usuario = :id_usuario");
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// Verificar que exista el usuario
if (!$user) {
    die("Error: No se encontraron datos del usuario.");
}

// Variables para el perfil
$email = $user['email'];
$nombre = $user['nombre'];
$apellido = $user['apellido'];
$foto_perfil = !empty($user['foto_perfil']) 
    ? $user['foto_perfil'] 
    : 'assets/images/icons/fotodefault.png';
?>

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
    <li class="lista-objeto"><a href="departamentos.php?">Inicio</a></li>
    <li class="lista-objeto"> <a onclick="mostrarSeccion('perfil')">Perfil</a></li>
    <li class="lista-objeto"><a onclick="mostrarSeccion('historial')">Historial compras</a></li>
    <li class="lista-objeto"><a onclick="mostrarSeccion('cerrar_login')">Cerrar sesión</a></li>
  </ul>
        </nav>
    <div id="perfil" class="cuerpo-perfil">

<div class="perfil-foto">
  <form id="form-foto" action="../hiper_card/assets/php/subir_foto.php" method="POST" enctype="multipart/form-data">
    <img id="foto-usuario" src="<?php echo htmlspecialchars($foto_perfil); ?>" class="foto-perfil" alt="Foto de perfil">
    <input type="file" name="foto" id="nueva_foto" accept="image/*" style="display:none;" onchange="previsualizarFoto(event)">
  </form>
</div>


    <div class="perfil-datos">
    <form class="form-datos" method="POST" action="../hiper_card/assets/php/conexion-login.php" autocomplete="on">
            <button type="button" onclick="document.getElementById('nueva_foto').click()">Cambiar foto</button>
      <button type="submit">Guardar foto</button>
        <div class="form-group">

          <label for="email">Corre electronico:</label>
              <div class="input-group">
            <input type="email" id="email" name="email"
         value="<?php echo htmlspecialchars($email); ?>"
         disabled required autocomplete="username">
           <button type="button" onclick="desbloquear('email', this)">✏️</button>
                </div>
          <label for="password">Contraseña:</label>
          <div class="input-group">
          <input type="password" id="password" name="password"
         value="<?php echo htmlspecialchars($password); ?>"
         disabled required autocomplete="current-password">          
         <button type="button" onclick="desbloquear('password', this)">✏️</button>
            </div>
          </div>
      </form>
    </div>
    </div>   
    <div id="historial" class="cuerpo-historial-de-compras">
      <form class="form-datos">
        <h2>Historial de compras</h2>
        <div id="lista-compras"></div>
      </form>
    </div>

    <div id="cerrar_login" class="cuerpo-cerra-sesion">
        <form class="form-datos">
        <button type="button" id="btn-cerrar-sesion">Cerrar Session</button>
        </form>
    </div>
        </div>
 

    <script src="../hiper_card/assets/js/perfil.js"></script>

</body>

</html>