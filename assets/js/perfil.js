// Alternar visibilidad de secciones
function mostrarSeccion(seccionId) {
  const secciones = document.querySelectorAll('.cuerpo-perfil, .cuerpo-historial-de-compras, .cuerpo-cerra-sesion');
  
  secciones.forEach(sec => {
    if(sec.id === seccionId) {
      sec.style.display = "block";  // Mostrar la sección seleccionada
      if (sec.id === "historial") cargarHistorial(); // Cargar historial cuando se ve
    } else {
      sec.style.display = "none";   // Ocultar las demás
    }
  });
}

    //para ver la foto antes de guardarlo 
    function previsualizarFoto(event) {
  const img = document.getElementById('foto-usuario');
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}
//para guarda foto
document.addEventListener("DOMContentLoaded", () => {
  const inputFoto = document.getElementById("nueva_foto");
  const formFoto = document.getElementById("form-foto");

  if (formFoto) {
    formFoto.addEventListener("submit", async (e) => {
      e.preventDefault(); // Evita que recargue la página
      const file = inputFoto.files[0];
      if (!file) {
        alert("Por favor selecciona una imagen antes de guardar.");
        return;
      }

      const formData = new FormData();
      formData.append("foto", file);

      try {
        const response = await fetch("../hiper_card/assets/php/subir_foto.php", {
          method: "POST",
          body: formData,
        });

        const data = await response.json();

        if (data.success) {
          // Actualizar imagen visualmente
          const fotoUsuario = document.getElementById("foto-usuario");
          fotoUsuario.src = data.url + "?t=" + new Date().getTime(); // Evita caché

          // Alerta predeterminada del navegador
          alert("La foto de perfil se ha cambiado correctamente.");

        } else {
          alert("Error al subir la imagen: " + data.error);
        }
      } catch (error) {
        console.error(error);
        alert("Error de conexión con el servidor.");
      }
    });
  }
});
////////////////////////////////////////////

    // Desbloquear inputs
    function desbloquear(id, boton) {
      const input = document.getElementById(id);
      input.disabled = !input.disabled;
      if (!input.disabled) {
        input.focus();
        boton.textContent = "🔓";
        boton.style.backgroundColor = "#28a745";
      } else {
        boton.textContent = "✏️";
        boton.style.backgroundColor = "#ff0000ff";
      }
    }

//llama php para cerrar

    const btnCerrar = document.getElementById("btn-cerrar-sesion");
if (btnCerrar) {
    btnCerrar.addEventListener("click", async () => {
        try {
            const response = await fetch("../hiper_card/assets/php/cerrar-sesion.php", {
                method: "POST",
            });
            const data = await response.json();
            if (data.success) {
                window.location.href = "login.php"; // Redirige al login
            } else {
                alert("Error al cerrar sesión: " + data.error);
            }
        } catch (err) {
            console.error(err);
            alert("Error de conexión al servidor.");
        }
    });
}
//////////////////////////
// Función para cargar historial de compras
async function cargarHistorial() {
  const contenedor = document.getElementById("lista-compras");
  contenedor.innerHTML = "<p>Cargando historial...</p>";

  try {
    const response = await fetch("../hiper_card/assets/php/historial-compras.php")
    const data = await response.json(); 

    if (!data.success) {
      contenedor.innerHTML = `<p>Error: ${data.error}</p>`;
      return;
    }

    if (data.data.length === 0) {
      contenedor.innerHTML = "<p>No tienes compras registradas.</p>";
      return;
    }

    // Agrupar por id_venta
    const ventasAgrupadas = {};
    data.data.forEach(item => {
      if (!ventasAgrupadas[item.id_venta]) {
        ventasAgrupadas[item.id_venta] = {
          fecha: item.fecha,
          total: item.total,
          productos: []
        };
      }
      ventasAgrupadas[item.id_venta].productos.push(item);
    });

    // Mostrar en HTML
    contenedor.innerHTML = "";
    for (const [id_venta, venta] of Object.entries(ventasAgrupadas)) {
      const divVenta = document.createElement("div");
      divVenta.classList.add("venta");
      divVenta.innerHTML = `
        <h3>Compra #${id_venta}</h3>
        <p><strong>Fecha:</strong> ${new Date(venta.fecha).toLocaleString()}</p>
        <ul>
     ${venta.productos.map(p => `
       <li>
           ${p.producto} - Cantidad: ${p.cantidad} - $${parseFloat(p.subtotal).toFixed(2)}
    </li>
      `).join("")}
        </ul>
        <p><strong>Total:</strong> $${parseFloat(venta.total).toFixed(2)}
        <hr>
      `;
      contenedor.appendChild(divVenta);
    }

  } catch (error) {
    contenedor.innerHTML = "<p>Error al conectar con el servidor.</p>";
    console.error(error);
  }
}

// Llamar cuando se muestra la pestaña de historial
function mostrarSeccion(seccionId) {
  const secciones = document.querySelectorAll('.cuerpo-perfil, .cuerpo-historial-de-compras, .cuerpo-cerra-sesion');
  secciones.forEach(sec => {
    if (sec.id === seccionId) {
      sec.style.display = "block";
      if (sec.id === "historial") cargarHistorial(); // cargar historial cuando se muestra
    } else {
      sec.style.display = "none";
    }
  });
}
/////////////////////////////////////////////////////////////////////////////////////////////////
    // Mostrar perfil por defecto al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    // Solo si ninguna sección está visible
    const perfil = document.getElementById('perfil');
    const historial = document.getElementById('historial');
    const cerrar = document.getElementById('cerrar_login');

    if (!perfil.classList.contains('visible') &&
        !historial.classList.contains('visible') &&
        !cerrar.classList.contains('visible')) {
        mostrarSeccion('perfil');
    }
});
