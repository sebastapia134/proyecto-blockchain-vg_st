<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <link rel="stylesheet" href="../assets/css/estiloLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="form-container">
                <h1>Bienvenid@ de Vuelta!</h1>
                <form action="../api/login.php" method="POST">
                    <label for="mail">Correo:</label>
                    <input type="text" id="mail" name="mail" placeholder="Ingrese su correo" required>
                    
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
                    
                    <button type="submit">Iniciar Sesión</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
