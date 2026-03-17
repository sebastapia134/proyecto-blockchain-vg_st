<?php
include __DIR__ . '/../../app/php/db.php'; // Conexión a la base de datos

// Leer datos del JSON recibido
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';

// Verificar si el correo existe en la tabla usuario
if (!empty($email)) {
    $stmt = $conn->prepare("SELECT nombre, url_foto FROM usuario WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($nombre, $url_foto);
    if ($stmt->fetch()) {
        echo json_encode(['existe' => true, 'nombre' => $nombre, 'url_foto' => $url_foto]);
    } else {
        echo json_encode(['existe' => false]);
    }
    $stmt->close();
} else {
    echo json_encode(['existe' => false]);
}

$conn->close();
?>
