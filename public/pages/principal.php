<?php include __DIR__ . '/../../app/php/auth.php';
 
include 'php/movimientos.php';  // Obtiene los movimientos del usuario

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="../assets/css/estilosPrincipal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="../assets/js/wallet.js" defer></script>
    


</head>
<body>


<!-- Overlay que bloquea la página -->
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
</style>


    <div id="banner" class="banner">
        <img src="../assets/img/ui/banner.jpg" alt="Banner" id="banner-img">
        <div class="profile" id="profile">
            <a href="perfilUsuario.php">
            <img src="<?php echo htmlspecialchars($_SESSION['url_foto'])?>" alt="Foto de perfil" id="profile-img">

            </a>
        </div>
    </div>

    <div id="usuario" class="usuario">
        Hola, <span id="usuario-nombre"><?php echo htmlspecialchars($_SESSION['nombre'])?></span>!
    </div>

    
    
    <div id="saldoDIV" class="saldo">
        <p id="saldo-titulo">Saldo</p> 
        <div id="saldo" class="saldo-monto">Conectate a MetaMask >         <span>ETH</span>
        </div>
        <div id="cuentaDIV" class="cuenta">
            <p id="cuenta-titulo">Cuenta</p>
            <div id="cuenta" class="cuenta-numero">No conectado</div>
        </div>

    </div>

    <br><br>
    
    <button id="pagarButton" class="pagar-btn">¿Pagamos?</button>

    <script>
  // Obtener el botón
  const pagarButton = document.getElementById('pagarButton');

  // Agregar el evento de clic
  pagarButton.addEventListener('click', () => {
    // Redirigir a localesCuadricula.php
    window.location.href = 'localesCuadricula.php';
  });
</script>


    <div id="movimientos" class="movimientos">
    <h2 id="movimientos-titulo">Movimientos</h2>

    <?php
    // Verificamos si hay movimientos
    if (count($movimientos) > 0) {
        $counter = 1; // Contador para los divs
        foreach ($movimientos as $row) {
            $idtransaccion = $row['idtransaccion'];
            $montoTotal = $row['montoTotal'];
            $fecha = date('d/m/Y', strtotime($row['timestamp']));
            $nombreLocal = $row['nombre'];
            $logoLocal = $row['url_foto'];
            $detalle = $row['detalle'];
    ?>

<div class="movimiento" id="movimiento-<?php echo $counter; ?> ">

                <img src="<?php echo $logoLocal; ?>" alt="Logo <?php echo $nombreLocal; ?>" class="movimiento-logo" id="movimiento-logo-<?php echo $counter; ?> href='google.com'">
                <div class="movimiento-detalle" id="movimiento-detalle-<?php echo $counter; ?>">
                <a href="<?php echo 'detalleMovimiento.php?id=' . $idtransaccion; ?>" target="_blank">

                    <div class="movimiento-nombre" id="movimiento-nombre-<?php echo $counter; ?>"><?php echo $nombreLocal; ?></div> </a>
                    <div class="movimiento-fecha" id="movimiento-fecha-<?php echo $counter; ?>"><?php echo $fecha; ?></div>
                    <div class="movimiento-detalle" id="movimiento-detalle-text-<?php echo $counter; ?>"><?php echo $detalle; ?></div>
                </div>
                <div class="movimiento-monto" id="movimiento-monto-<?php echo $counter; ?>"><?php echo "$" . number_format($montoTotal, 2); ?></div>
            </div>
           
    <?php
            $counter++;
        }
    } else {
        echo "<p>No hay movimientos registrados.</p>";
    }
    ?>
</div>


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

    <footer id="footer" class="footer">Todos los derechos reservados</footer>
</body>
</html>
