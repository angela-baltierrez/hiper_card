<?php
session_start();

// Destruir todos los datos de sesión
session_unset();
session_destroy();

// Redirigir a la página principal
header('Location:  ../../superpagina.php' ); // Asegurate de que la ruta sea correcta
exit();