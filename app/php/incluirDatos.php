<?php
// Incluir la conexión a la base de datos
include __DIR__ . '/../../app/php/db.php';

// Obtener el idlocal desde la URL
$idlocal = isset($_GET['idlocal']) ? (int)$_GET['idlocal'] : 0;

if ($idlocal > 0) {
    // Consultar los datos del local según el idlocal
    $query = $conn->prepare("
        SELECT nombre, url_foto, direccionLocal_codigoQR
        FROM local
        WHERE idlocal = ?
    ");
    $query->bind_param("i", $idlocal);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $local = $result->fetch_assoc();
    } else {
        die("Local no encontrado.");
    }
} else {
    die("ID del local no válido.");
}
?>
