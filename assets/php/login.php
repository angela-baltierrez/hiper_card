
<?php
define("HOST", "localhost");
define("DB", "hiper-card");
define("USER","root");
define("PASSWORD", "");
$con = mysqli_connect(HOST, USER, PASSWORD, DB);

if (!$conn)
{
    die ("No hay conexión: ".mysqli_connect_error());
}

$email= $_POST('email');
$pass= $_POST('password');

$query= mysqli_query($conn, "SELECT * FROM Clientes WHERE email= '".$email."' and contraseña ='".$pass."'");
$nr = mysqli_num_rows($query);
if($nr == 1){
    header("Location : supernidea.html");
}
else if ($nr == 0)
{
    header("Location : login.html");
}
?>
