<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>registro</title>
</head>
<body>
        <h1>Hiper Card</h1>
        <h3>Registrarse </h3>
      
    <form method="POST" action="../hiper_card/assets/php/conexion-registro-emp.php" autocomplete="on">
    <div class="form-group">
<label for="name">Nombre de usuario:</label>
    <input type="text" id="name" name="name" placeholder="Ingresa un nombre de usuario" required autocomplete="off">
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required autocomplete="new-password">

        <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required autocomplete="username">


            <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required autocomplete="given-name">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required autocomplete="family-name">

       <a class="link" href="../hiper_card/login.php"> Si ya tenes cuenta, haz click aquí </a>
        <div class="form-group button-class">
           
          <button type="submit"><a style="color: #fff;">crear cuenta</a></button>
        </div>
      </form>
</body> 
</html>