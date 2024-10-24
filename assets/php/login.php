<?php
define("HOST", "localhost");
define("DB", "hiper-card");
define("USER","root");
define("PASSWORD", "");
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

if (!$conn)
{
    die ("No hay conexión: ".mysqli_connect_error());
}

$email = $_POST["email"];
$pass = md5($_POST["password"]);

$query= mysqli_query($conn, "SELECT email, contraseña FROM Clientes WHERE email = '" . $email . "' and contraseña = '" . $pass . "'");
$nr = mysqli_num_rows($query);

if($nr == 1){
    header('Location: ../supernidea.html ');
}
else if ($nr == 0)
{
    header('Location: ../login.html');
}
?> 