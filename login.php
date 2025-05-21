<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../hiper_card/assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="../hiper_card/assets/php/conexion-login.php" autocomplete="on">
        <h1>Hiper Card</h1>
        <h3>Iniciar sesion </h3>
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
</body>
</html>