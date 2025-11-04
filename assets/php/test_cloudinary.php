<?php
require __DIR__ . '/../../vendor/autoload.php';


use Cloudinary\Cloudinary;

$cloudinary = new Cloudinary([
  'cloud' => [
    'cloud_name' => 'hipercard',
    'api_key'    => '766975685672989',
    'api_secret' => 'W7PdV5xxnfvhGpKzu5DuEDP0COE',
  ],
  'url' => [
    'secure' => true
  ]
]);
$result = $cloudinary->uploadApi()->upload('C:/xampp/htdocs/hiper_card/assets/images/icons/panda.png');
print_r($result);
echo "Cloudinary listo";