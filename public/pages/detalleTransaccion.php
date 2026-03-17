<?php include __DIR__ . '/../../app/php/auth.php';
 
include __DIR__ . '/../../app/php/incluirDatos.php';  // Obtiene los movimientos del usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>División de Pagos</title>
  <link rel="stylesheet" href="../assets/css/estilosTransaccion.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Contenedor Principal -->
  <div id="banner" class="banner">
    <img src="../assets/img/ui/banner.jpg" alt="Banner" class="banner-img">
    <div class="profile" id="profile">
      <img src="<?php echo htmlspecialchars($_SESSION['url_foto'])?>" alt="Foto de perfil" id="profile-img">
    </div>
  </div>
  
  <button id="volver" class="volver-btn">
    <img src="https://cdn-icons-png.freepik.com/512/17/17699.png" alt="Regresar" id="volver-img">
  </button>



  
  <div id="principal" class="principal">
    <!-- Encabezado -->
    <div id="encabezado" class="encabezado">
      <img src="<?php echo htmlspecialchars($local['url_foto']); ?>" alt="Logo del Local" class="local-logo">
      <div id="localInfo" class="local-info">
        <!-- Nombre del local dinámico -->
        <h1 id="local-name"><?php echo htmlspecialchars($local['nombre']); ?></h1>

        <p id="host-name"><?php echo htmlspecialchars($_SESSION['nombre']); ?> - Anfitrión</p>
        <img src="<?php echo htmlspecialchars($_SESSION['url_foto']); ?>" alt="Logo del host" class="host-profile">

        <div id="linkContainer" class="link-container">
          <!-- Enlace dinámico para el pago -->
          <a href="<?php echo htmlspecialchars($local['direccionLocal_codigoQR']); ?>" id="enlacePago" class="enlace-pago" target="_blank"><?php echo htmlspecialchars($local['direccionLocal_codigoQR']); ?></a>
          <button id="copiarEnlace" class="copiar-enlace-btn">
            <img src="https://cdn-icons-png.flaticon.com/512/54/54702.png" alt="Copiar enlace" class="copiar-enlace-img">
          </button>
        </div>
      </div>
      
    </div>

    <!-- Monto Total -->
    <div id="montoTotal" class="monto-total">
        <div class="montoEditableContainer" id="montoEditableContainer">
            <input type="text"  class="montoTotal-input" id="monto-total" />
        </div>
    </div>

    <!-- Checklist -->
    <div id="opcionesPago" class="opciones-pago">
      <label for="pagoIgual" id="pagoIgual-label">
        <input type="checkbox" id="pagoIgual" class="pago-igual-checkbox">
        ¿Pagan todos iguales?
      </label>
    </div>

    <!-- Invitados -->
    <div id="invitados" class="invitados">
      <h2 id="invitados-title">Invitados</h2>
      <button id="botonAgregar"><strong>+ 👥</strong></button>
      <br>
      <br>
      <br>
    
      
    </div>


    <!-- Modal -->
<div id="modalBuscador" class="modal ocultar">
  <div class="modal-contenido">
    <h2>Buscar Invitado 😜</h2>
    <input type="text" id="buscadorUsuario" class="buscador-input" placeholder="Ingresa el correo del usuario">
    <div class="modal-botones">
      <button id="botonAgregarUsuario" class="boton">Agregar</button>
      <button id="botonCancelar" class="boton">Cancelar</button>
    </div>
  </div>
</div>

    <!-- Descripción -->
    <div id="descripcionTransaccion" class="descripcion-transaccion">
      <label for="descripcion" id="descripcion-label">Descripción:</label>
      <textarea id="descripcion" class="descripcion-textarea" placeholder="Agrega una descripción"></textarea>
    </div>

    <!-- Botón -->
    <div id="contenedorBoton" class="contenedor-boton">
      <button id="pagamos" class="pagamos-btn">
        <img src="https://images.vexels.com/media/users/3/157464/isolated/preview/716d29a07c53f4213905e1257c9588a7-icono-de-pago-movil-blanco-y-negro.png" alt="Icono Pagamos" class="icono-pagamos" id="icono-pagamos">
        <span id="pagamos-text">Pagamos</span>
      </button>
    </div>
  </div>

  <footer id="footer" class="footer">Todos los derechos reservados</footer>

  <script>
    const presionarAgregar=document.getElementById('botonAgregar');
presionarAgregar.addEventListener('click',()=>{

  const buscador;
});
      </script>





  <script>

document.getElementById("volver").addEventListener("click", function() {
    window.location.href = "localesCuadricula.php";
});

    const copiarEnlace = document.getElementById('copiarEnlace');
    copiarEnlace.addEventListener('click', () => {
      const enlace = document.getElementById('enlacePago').href;
      navigator.clipboard.writeText(enlace).then(() => {
      });
    });


    // Modal
// Modal
const botonAgregar = document.getElementById('botonAgregar');
const modalBuscador = document.getElementById('modalBuscador');
const botonCancelar = document.getElementById('botonCancelar');
const botonAgregarUsuario = document.getElementById('botonAgregarUsuario');
const buscadorUsuario = document.getElementById('buscadorUsuario');
const invitadosDiv = document.getElementById('invitados');

// Array para controlar los invitados ya agregados
let listaDeInvitados = [];

// Correo del anfitrión (obtenido de la sesión o de la base de datos)
const correoAnfitrion = '<?php echo $_SESSION['mail']; ?>'; // Ajusta este valor según cómo lo almacenes

botonAgregar.addEventListener('click', () => {
  modalBuscador.classList.remove('ocultar');
});

botonCancelar.addEventListener('click', () => {
  modalBuscador.classList.add('ocultar');
  buscadorUsuario.value = '';
});

botonAgregarUsuario.addEventListener('click', () => {
  const email = buscadorUsuario.value.trim();

  if (email) {
    // Verificar si el usuario ya está en la lista de invitados o si es el anfitrión
    if (listaDeInvitados.includes(email)) {
      alert('Este usuario ya fue agregado.');
      buscadorUsuario.value = '';
      return;
    }

    if (email === correoAnfitrion) {
      alert('No puedes agregar al anfitrión como invitado.');
      buscadorUsuario.value = '';
      return;
    }

    // Hacer consulta a la base de datos
    fetch('../api/buscarUsuario.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    })
      .then(response => response.json())
      .then(data => {
        if (data.existe) {
          // Agregar email al array de invitados
          listaDeInvitados.push(email);

          // Crear un nuevo div para el invitado con su foto de perfil
          const nuevoInvitado = document.createElement('div');
          nuevoInvitado.classList.add('invitado');
          nuevoInvitado.innerHTML = `
            <img src="${data.url_foto}" alt="Foto de perfil" class="foto-invitado">
            <p>${data.nombre}</p>
            <div class="montoEditableContainer">
              <span class="simboloDolar">$</span>
              <input type="text" class="montoEditable" />
            </div>
          `;
          invitadosDiv.appendChild(nuevoInvitado);

          alert('¡Usuario agregado!');
        } else {
          alert('Usuario no encontrado');
        }

        // Cerrar modal y limpiar campo de búsqueda
        modalBuscador.classList.add('ocultar');
        buscadorUsuario.value = '';
      })
      .catch(error => console.error('Error:', error));
  } else {
    alert('Ingresa un correo válido');
  }
});


// Botón de pago
const botonPagar = document.getElementById("pagamos");
const montoTotalInput = document.getElementById("monto-total");
const overlayPropina = document.createElement("div");
overlayPropina.id = "overlayPropina";
overlayPropina.classList.add("modal", "ocultar");

overlayPropina.innerHTML = `
  <div class="modal-contenido">
    <h2>¿Deseas dar el excedente como propina?</h2>
    <p id="mensajePropina"></p>
    <div class="modal-botones">
      <button id="aceptarPropina" class="boton">Sí</button>
      <button id="rechazarPropina" class="boton">No</button>
    </div>
  </div>
`;
document.body.appendChild(overlayPropina);

let calcularMontos = () => {
  const montoTotal = parseFloat(montoTotalInput.value);
  if (isNaN(montoTotal) || montoTotal <= 0) {
    alert("Por favor, ingresa un monto total válido.");
    return false;
  }

  const montosParticipantes = document.querySelectorAll(".montoEditable");
  let sumaMontos = 0;

  montosParticipantes.forEach((input) => {
    const valor = parseFloat(input.value);
    if (!isNaN(valor)) {
      sumaMontos += valor;
    }
  });

  if (sumaMontos < montoTotal) {
    alert("La suma de los montos es menor al monto total.");
    return false;
  } else if (sumaMontos > montoTotal) {
    const excedente = (sumaMontos - montoTotal).toFixed(2);
    document.getElementById("mensajePropina").textContent = `El excedente es $${excedente}.`;
    overlayPropina.classList.remove("ocultar");

    // Manejo del overlay
    document.getElementById("aceptarPropina").onclick = () => {
      overlayPropina.classList.add("ocultar");
      finalizarPago(montoTotal, sumaMontos); // Continúa con la transacción
    };

    document.getElementById("rechazarPropina").onclick = () => {
      overlayPropina.classList.add("ocultar");
    };
    return false;
  } else {
    finalizarPago(montoTotal, sumaMontos); // Continúa con la transacción
    return true;
  }
};

botonPagar.addEventListener("click", calcularMontos);

function finalizarPago(montoTotal, sumaMontos) {
  alert("Transacción completada con éxito.");
  // Aquí puedes agregar lógica para enviar la transacción al servidor
}



  </script>
</body>
</html>
