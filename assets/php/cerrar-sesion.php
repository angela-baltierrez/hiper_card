<?php
session_start();
header('Content-Type: application/json');

try {
    session_unset(); // Limpiar variables de sesión
    session_destroy(); // Destruir sesión
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>