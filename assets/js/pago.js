//ocultar el formulario de la tarjeta y mostrar el formulario de envío.
  document.getElementById('btnVolver').addEventListener('click', () => {
  document.getElementById('form-tarjeta').style.display = 'none';
  document.getElementById('form-envio').style.display = 'block';
});
//ocultamos el formulario de envío y mostrar el formulario de la tarjeta.
  document.getElementById('btnSiguiente').addEventListener('click', () => {
    document.getElementById('form-envio').style.display = 'none';
    document.getElementById('form-tarjeta').style.display = 'block';
  });
// antes de enviar el formulario de tarjeta, se agrega al formulario un campo oculto con el contenido del carrito guardado en localStorage.
  document.getElementById('formTarjeta').addEventListener('submit', function (e) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const inputCarrito = document.createElement('input');

    inputCarrito.type = 'hidden';
    inputCarrito.name = 'carrito';
    inputCarrito.value = JSON.stringify(carrito);
    this.appendChild(inputCarrito);
  });