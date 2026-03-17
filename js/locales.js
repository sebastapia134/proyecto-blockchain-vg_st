document.addEventListener("DOMContentLoaded", async () => {
    const localesContainer = document.getElementById("locales-container");

    // Función para obtener los locales desde el servidor
    const obtenerLocales = async () => {
        try {
            // Realizar la solicitud al servidor para obtener los locales
            const response = await fetch("php/locales.php");
            const locales = await response.json();

            // Generar los elementos HTML para cada local
            locales.forEach(local => {
                const localItem = document.createElement("div");
                localItem.classList.add("grid-item");

                // Crear el enlace para redirigir al detalle de la transacción
                const localLink = document.createElement("a");
                localLink.href = `http://localhost/blockchain/detalleTransaccion.php?idlocal=${local.idlocal}`;
                localLink.innerHTML = `
                    <img src="${local.url_foto}" alt="${local.nombre}" />
                    <h2>${local.nombre}</h2>
                `;

                // Añadir el enlace al item de la cuadrícula
                localItem.appendChild(localLink);

                // Añadir el local a la cuadrícula
                localesContainer.appendChild(localItem);
            });
        } catch (error) {
            console.error("Error obteniendo los locales:", error);
        }
    };

    // Llamar a la función para obtener los locales cuando la página cargue
    await obtenerLocales();
});
