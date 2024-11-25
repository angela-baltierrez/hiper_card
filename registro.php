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
      
        <form method="POST" action="../hiper_card/assets/php/conexion-registro.php">
        <div class="form-group">
          <label for="name">nombre de usuario:</label>
          <input type="text" id="name" name="name" placeholder="Ingresa un nombre de usuario" required>
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required>
          <label for="email">Correo electronico:</label>
          <input type="email" id="email" name="email" placeholder="Ingresa tu correo electronico" required>
          <a class="link" href="login.html"> Si ya tenes cuenta, haz click aquí </a>
        </div>
      
        <div class="form-group button-class">
          <button type="submit"><a style="color: #fff;">crear cuenta</a></button>
        </div>
      </form>
</body> 
</html>