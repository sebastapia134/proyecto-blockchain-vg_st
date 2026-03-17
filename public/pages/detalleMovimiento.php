<?php include __DIR__ . '/../../app/php/detalleEspecifico.php'; 
include __DIR__ . '/../../app/php/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Movimiento</title>
    <link rel="stylesheet" href="../assets/css/estilosDetalleMovimiento.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Banner -->
    <div id="banner" class="banner">
        <img src="../assets/img/ui/banner.jpg" alt="Banner" id="banner-img">
        <div class="profile" id="profile">
            <a href="perfilUsuario.php">
            <img src="<?php echo htmlspecialchars($_SESSION['url_foto'])?>" alt="Foto de perfil" id="profile-img">

            </a>
        </div>
    </div>

    <!-- Movimientos -->
    <div id="movimientos">
        <h2>Movimientos</h2>
        <div class="movimiento">
            <img src="<?php echo $transacciones[0]['url_foto']; ?>" alt="Logo Local X" class="movimiento-logo">
            <div class="movimiento-detalle">
                <div class="movimiento-nombre"><?php echo $transacciones[0]['nombre_local']; ?></div>
                <div class="movimiento-fecha"><?php echo date('d/m/Y', strtotime($transacciones[0]['timestamp_transaccion'])); ?></div>
            </div>
            <div class="movimiento-monto"><?php echo "$" . number_format($transacciones[0]['monto_total'], 2); ?></div>
        </div>
    </div>

    <!-- Detalle de Movimientos -->
    <div id="detalleMovimientos">
        <?php foreach ($transacciones as $transaccion): ?>
        <div class="movimientoCuadro">
            <div class="icono"><img src="<?php echo $transaccion['fotoPerfil']; ?>" alt=""></div>
            <div class="info">
                <p class="nombre"><?php echo $transaccion['nombre_usuario']; ?></p>
                <p class="cuenta"><?php echo $transaccion['billetera_usuario']; ?></p>
            </div>
            <div class="monto"><?php echo "$" . number_format($transaccion['monto_individual'], 2); ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Detalle de la Factura -->
    <div id="detalleFactura">
        <b>Detalle: </b>
        <p><?php echo $transacciones[0]['detalle_transaccion']; ?></p>
    </div>

  <!-- Botón de Compartir -->
<div id="contenedorBoton">
    <button id="compartir">
        <img src="https://cdn-icons-png.flaticon.com/512/52/52049.png" alt="Icono de compartir">
        <span>Compartir</span>
    </button>
</div>

<script>
document.getElementById("compartir").addEventListener("click", function() {
    // Selecciona el contenido de la página que deseas capturar (por ejemplo, el cuerpo entero)
    html2canvas(document.body).then(function(canvas) {
        // Crea un enlace para descargar la imagen
        var link = document.createElement('a');
        link.download = 'captura.png'; // Nombre del archivo a descargar
        link.href = canvas.toDataURL('image/png'); // Convierte el canvas a una URL de imagen
        link.click(); // Simula el clic para descargar la imagen
    });
});
</script>

    
    <footer>Todos los derechos reservados</footer>

</body>
</html>
