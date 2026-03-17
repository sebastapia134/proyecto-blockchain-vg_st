<?php
// Incluir la conexión a la base de datos
include 'db.php';

// Consultar los locales, incluyendo el atributo direccionLocal_codigoQR
$query = $conn->prepare("
    SELECT idlocal, nombre, url_foto, direccionLocal_codigoQR
    FROM local
    ORDER BY timestamp DESC
");
$query->execute();
$result = $query->get_result();

// Crear un array para almacenar los locales
$locales = [];
while ($row = $result->fetch_assoc()) {
    $locales[] = $row; // Almacena cada local en el array
}

// Devuelve los locales como una respuesta JSON
echo json_encode($locales);
?>
