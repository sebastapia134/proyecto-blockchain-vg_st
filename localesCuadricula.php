<?php include 'php/auth.php'; 
include 'php/movimientos.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Locales</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="js/wallet.js" defer></script>  
  <link rel="stylesheet" href="estilosCuadricula.css">
</head>
<body>

<div id="overlay">
    <div id="overlay-content">
        <p>Por favor, conecta tu wallet a MetaMask para continuar.</p>
        <button id="connectButton">Estoy Conectado!</button>
    </div>
</div>

<style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #overlay-content {
        text-align: center;
        color: white;
    }

    #connectButton {
        background-color: #f9a825;
        color: black;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }

    #connectButton:hover {
        background-color: #ffd740;
    }

    h1{
        margin-left: 20px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", async () => {
    const overlay = document.getElementById("overlay");
    const connectButton = document.getElementById("connectButton");

    const checkMetaMaskConnection = async () => {
        if (typeof window.ethereum !== "undefined") {
            try {
                // Verifica si ya hay cuentas conectadas
                const accounts = await ethereum.request({ method: "eth_accounts" });
                if (accounts.length > 0) {
                    overlay.style.display = "none"; // Oculta el overlay
                }
            } catch (error) {
                console.error("Error verificando MetaMask: ", error);
            }
        } else {
            alert("MetaMask no está instalado. Por favor, instálalo para continuar.");
        }
    };

    const connectMetaMask = async () => {
        if (typeof window.ethereum !== "undefined") {
            try {
                const accounts = await ethereum.request({ method: "eth_requestAccounts" });
                if (accounts.length > 0) {
                    overlay.style.display = "none"; // Oculta el overlay
                }
            } catch (error) {
                console.error("Error conectando a MetaMask: ", error);
            }
        } else {
            alert("MetaMask no está instalado. Por favor, instálalo para continuar.");
        }
    };

    connectButton.addEventListener("click", connectMetaMask);

    // Verifica la conexión al cargar la página
    await checkMetaMaskConnection();
});

</script>


<div id="banner" class="banner">
        <img src="img/banner.jpg" alt="Banner" id="banner-img">
        <div class="profile" id="profile">
            <a href="perfilUsuario.php">
            <img src="<?php echo htmlspecialchars($_SESSION['url_foto'])?>" alt="Foto de perfil" id="profile-img">

            </a>
        </div>
    </div>


  <!-- Contenedor Principal -->
  <div class="container">
    <!-- Banner -->
    <header class="banner">
      <h1>Explora Nuestros Locales</h1>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
      <div class="grid-container" id="locales-container">
        <!-- Aquí se generarán dinámicamente los locales -->
      </div>
    </main>

    <!-- Footer -->


  <!-- Script -->
  <script src="js/locales.js"></script>
  <footer id="footer" class="footer">Todos los derechos reservados</footer>

</body>

</html>
