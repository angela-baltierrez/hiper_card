
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
        </head>
        <body>
  <form id="formCompleto" method="POST" action="../hiper_card/assets/php/conexion-factura.php">
    <!-- PRIMERA SECCIÓN: ENVÍO -->
    <div id="form-envio" style="display: flex; flex-direction: column; gap: 10px;">
      <div id="lista-productos"></div>
      <p><strong>Total: $<span id="total"></span></strong></p>
      <script>
        const total = localStorage.getItem('totalCompra') || 0;
        document.getElementById('total').textContent = total;
      
      </script>

      <label>Dirección de envío</label>
      <input type="text" name="direccion_envio" placeholder="Ingresa tu dirección" required>

      <label>Teléfono</label>
      <input type="text" name="telefono_envio" placeholder="Ingrese su teléfono" required>

      <label>Código Postal (CP)</label>
      <input type="text" name="cp_envio" placeholder="Ingrese su CP" maxlength="16" required>

      <button type="button" id="btnSiguiente">Siguiente</button>
    </div>

    <!-- SEGUNDA SECCIÓN: TARJETA -->
    <div id="form-tarjeta" style="display: none; flex-direction: column; gap: 10px;">
      <div style="display: flex; justify-content: space-between;">
        <label>Nombre:</label>
        <label>Apellido:</label>
      </div>

      <div style="display: flex; gap: 10px;">
        <input name="nombre" type="text" placeholder="Ingresa tu nombre" required>
        <input name="apellido" type="text" placeholder="Ingresa tu apellido" required>
      </div>

      <label>Tipo de pago</label>
      <select name="tipo_pago" required>
        <option value="credito">Tarjeta de Crédito</option>
        <option value="debito">Tarjeta de Débito</option>
      </select>

      <label>Número de tarjeta</label>
      <input type="text" name="numero_tarjeta" placeholder="Ingresa tu número de tarjeta" maxlength="16" required>

      <div style="display: flex; justify-content: space-between;">
        <label>Vencimiento (MM/AA):</label>
        <label>CSC:</label>
      </div>
      <div style="display: flex; gap: 10px;">
        <input type="text" name="vencimiento" placeholder="MM/AA" maxlength="5" required>
        <input type="text" name="csc" placeholder="CSC (3 dígitos)" maxlength="3" required>
      </div>

      <label>Dirección de facturación</label>
      <input type="text" name="direccion_facturacion" placeholder="Ingresa tu dirección" required>

      <label>Teléfono de facturación</label>
      <input type="text" name="telefono_facturacion" placeholder="Ingrese su teléfono" required>

      <div style="margin-top: 10px;">
        <button type="button" id="btnVolver">Volver</button>
        <button type="submit" id="btnComprar">Comprar</button>
      </div>
    </div>
  </form>

  <script>
   
    document.getElementById('btnSiguiente').addEventListener('click', function () {
      document.getElementById('form-envio').style.display = 'none';
      document.getElementById('form-tarjeta').style.display = 'flex';
    });

    document.getElementById('btnVolver').addEventListener('click', function () {
      document.getElementById('form-envio').style.display = 'flex';
      document.getElementById('form-tarjeta').style.display = 'none';
    });
 document.getElementById('formCompleto').addEventListener('submit', function (e) {
  e.preventDefault(); // Evita que el formulario se envíe normalmente

  const carrito = localStorage.getItem('carrito');

  // Verificación opcional
  if (!carrito || carrito === '[]') {
    alert('El carrito está vacío');
    return;
  }

  // Agregar input oculto con carrito
  const inputCarrito = document.createElement('input');
  inputCarrito.type = 'hidden';
  inputCarrito.name = 'carrito';
  inputCarrito.value = carrito;
  this.appendChild(inputCarrito);

  const formData = new FormData(this);

  fetch('../hiper_card/assets/php/conexion-factura.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      if (!response.ok) throw new Error('Error en el envío');
      return response.text();
    })
    .then(data => {
      console.log('Respuesta del servidor:', data);
      window.location.href = 'factura.php'; // Redirigir después de éxito
    })
    .catch(error => {
      alert('Hubo un problema al enviar los datos: ' + error.message);
    });
});
</script>
</body>
        </html>
