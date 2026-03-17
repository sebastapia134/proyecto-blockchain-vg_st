<?php
// Incluir la conexión a la base de datos
include __DIR__ . '/../../app/php/db.php'; 

// Obtener el ID del usuario logueado desde la sesión
$idusuario = $_SESSION['idusuario'];

// Consultar las transacciones del usuario
$query = $conn->prepare("
    SELECT t.idtransaccion, t.montoTotal, t.timestamp, t.detalle, l.idlocal, l.nombre, l.url_foto
    FROM transaccion t
    JOIN local l ON t.local_idlocal = l.idlocal
    WHERE t.usuario_idusuario = ?
    ORDER BY t.timestamp DESC
");
$query->bind_param("i", $idusuario);
$query->execute();
$result = $query->get_result();

// Crear un array para almacenar las transacciones
$movimientos = [];
while ($row = $result->fetch_assoc()) {
    $movimientos[] = $row;  // Almacena la transacción en el array
}

?>
