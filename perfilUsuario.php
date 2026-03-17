<?php include 'php/auth.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="estilosPerfilUsuario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>

    <div id="regresarDiv" class="regresar-div">
        <button id="regresar" class="regresar-btn">
            <a href="principal.php">
            <img src="https://cdn-icons-png.freepik.com/512/17/17699.png" alt="Regresar" id="regresar-img">

            </a>
        </button>
    </div>

    <div id="header" class="header">
        <div class="profile-photo" id="profile-photo">
            <img src="<?php echo htmlspecialchars($_SESSION['url_foto'])?>" alt="Foto de perfil" id="profile-img">
        </div>
    </div>

    <div id="userInfo" class="user-info">
        <h2 id="user-name"><?php echo htmlspecialchars($_SESSION['nombre'])?></h2>
        <p id="user-email"><?php echo htmlspecialchars($_SESSION['mail'])?></p>
    </div>

    <div id="qr-section" class="qr-section">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Commons_QR_code.png" alt="Código QR" class="qr" id="qr-img">
        <div class="link-copy" id="link-copy">
            <span id="user-link"><?php echo htmlspecialchars($_SESSION['blockchain_direccion'])?></span>
            <img src="https://cdn-icons-png.flaticon.com/512/54/54702.png" alt="Copiar enlace" class="copy-icon" id="copy-icon">
        </div>
    </div>

  <br>
   

  <div id="contenedorBoton" class="contenedor-boton">
    <a href="php/logout.php" id="salir" class="salir-btn">
        <span id="salir-text">Cerrar Sesión</span>
    </a>
</div>

    <footer id="footer" class="footer">Todos los derechos reservados</footer>

</body>
</html>
