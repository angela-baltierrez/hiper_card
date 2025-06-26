<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra</title>
    <style>
        .producto {
            border-bottom: 1px solid #ccc;
            padding: 8px 0;
        }
    </style>
</head>
<body>
    <h1>Resumen de tu Compra</h1>
    <div id="lista-productos"></div>
    <p><strong>Total: $<span id="total"></span></strong></p>
<button id="volver">volver</button>
    <script>

        const historial = JSON.parse(localStorage.getItem('historialCompra')) || [];
        const total = localStorage.getItem('totalCompra') || 0;
        const lista = document.getElementById('lista-productos');
        const totalSpan = document.getElementById('total');

        if (historial.length === 0) {
            lista.innerHTML = '<p>No hay productos en el historial.</p>';
        } else {
            historial.forEach(producto => {
                const div = document.createElement('div');
                div.className = 'producto';
                div.innerHTML = `
                    <p><strong>${producto.title}</strong></p>
                    <p>Cantidad: ${producto.quantity}</p>
                    <p>Precio: ${producto.price}</p>
                `;
                lista.appendChild(div);
            });
        }

        totalSpan.textContent = total;
        
        // (opcional) limpiar localStorage después de mostrar el resumen
        // localStorage.removeItem('carrito');
        // localStorage.removeItem('totalCompra');
        // localStorage.removeItem('historialCompra');
  document.getElementById('volver').addEventListener('click', () => {
         localStorage.removeItem('carrito'); // Limpia el carrito
            window.location.href = 'departamentos.php';
        });
  </script>

  
</body>
</html>