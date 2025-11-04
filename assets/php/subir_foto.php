<?php
session_start();
header('Content-Type: application/json'); // Asegura que se devuelva JSON puro

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/env.php';

use Cloudinary\Cloudinary;

// ✅ Verificar sesión
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No hay sesión activa o falta el id de usuario.']);
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// ✅ Crear conexión con la base de datos
$conn = Cconexion::ConexionBD();

// ✅ Configurar Cloudinary
$cloudinary = new Cloudinary([
  'cloud' => [
    'cloud_name' => 'hipercard',
    'api_key'    => '766975685672989',
    'api_secret' => 'W7PdV5xxnfvhGpKzu5DuEDP0COE',
  ],
]);

// ✅ Verificar si se subió una imagen
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['foto']['tmp_name'];

    try {
        // Subir a Cloudinary
        $result = $cloudinary->uploadApi()->upload($fileTmpPath);
        $urlImagen = $result['secure_url'];

        // Actualizar en la base de datos
        $stmt = $conn->prepare("UPDATE Usuarios SET foto_perfil = :foto WHERE id_usuario = :id");
        $stmt->bindParam(':foto', $urlImagen);
        $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true, 'url' => $urlImagen]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => 'Error al procesar la imagen: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No se subió ninguna imagen o hubo un error en la carga.']);
}