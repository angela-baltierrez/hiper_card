// Alternar visibilidad de secciones
    function mostrarSeccion(seccion) {
      const secciones = document.querySelectorAll('.cuerpo-perfil, .cuerpo-historial-de-compras, .cuerpo-cerra-sesion');
      secciones.forEach(sec => sec.classList.remove('visible'));

      document.getElementById(seccion).classList.add('visible');
    }

    // Desbloquear inputs
    function desbloquear(id, boton) {
      const input = document.getElementById(id);
      input.disabled = !input.disabled;
      if (!input.disabled) {
        input.focus();
        boton.textContent = "🔒";
        boton.style.backgroundColor = "#28a745";
      } else {
        boton.textContent = "✏️";
        boton.style.backgroundColor = "#007bff";
      }
    }