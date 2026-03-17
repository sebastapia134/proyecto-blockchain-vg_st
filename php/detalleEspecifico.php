<?php
include 'db.php';  // Incluir la conexión a la base de datos

// Obtener el id de la transacción desde la URL
$idTransaccion = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si se proporcionó un id válido
if ($idTransaccion <= 0) {
    die("ID de transacción no válido.");
}

// A partir de aquí, ya deberías tener acceso a la variable $conn
$sql = "
SELECT 
    l.nombre AS nombre_local,
    l.url_foto,
    t.timestamp AS timestamp_transaccion,
    t.montoTotal AS monto_total,
    u.nombre AS nombre_usuario,
    u.url_foto AS fotoPerfil,
    u.blockchain_direccion AS billetera_usuario,
    m.montoIndividual AS monto_individual,
    t.detalle AS detalle_transaccion
FROM 
    transaccion t
JOIN 
    local l ON t.local_idlocal = l.idlocal
JOIN 
    movimiento m ON t.idtransaccion = m.transaccion_idtransaccion
JOIN 
    usuario u ON m.usuario_idusuario = u.idusuario
WHERE 
    t.idtransaccion = ?
";

// Preparar la consulta para evitar inyección SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idTransaccion);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

// Verificar si la consulta fue exitosa
if ($result->num_rows > 0) {
    // Almacenar los resultados en un array
    $transacciones = [];
    while ($row = $result->fetch_assoc()) {
        $transacciones[] = $row;
    }
    // Aquí podrías procesar y mostrar los datos si es necesario
} else {
    echo "No se encontraron resultados";
}

$stmt->close(); // Cerrar el statement
$conn->close();  // Cerrar la conexión
?>
